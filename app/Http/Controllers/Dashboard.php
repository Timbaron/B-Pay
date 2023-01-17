<?php

namespace App\Http\Controllers;

use App\Models\ReferalHistory;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class Dashboard extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $transactions = Transaction::whereUserId($user->id)->latest()->paginate(15);
        return view('Dashboard',compact('user','transactions'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user'));
    }

    public function findAccount(){
        $acct_number = request()->acct_number;
        $user = User::whereAcctNumber($acct_number)->first();
        if($user){
            return response()->json([
                'status' => 'success',
                'account_name' => $user->first_name . ' ' . $user->last_name
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Account not found'
            ]);
        }
    }

    public function transferInitiate(){
        $this->validate(request(),[
            'from-account' => 'required',
            'acct_number' => 'required',
            'amount' => 'required',
            'password' => 'required'
        ]);
        if(!Hash::check(request()->password, auth()->user()->password)){
            notify()->error('Password does not match', 'Error');
            return redirect()->route('dashboard');
        }
        $user = User::whereId(auth()->user()->id)->first();;
        $receiver = User::where('acct_number', request()->acct_number)->firstOrFail();
        $amount = request()->amount;
        $Userdescription = 'Transfer of '. request()->amount . ' To ' . $receiver->first_name;
        $Receiverdescription = 'Received '. request()->amount . ' From ' . $user->first_name;
        // debit user
        $send = $user->update(['balance' => $user->balance - $amount]);
        // credit receiver
        $receive = $receiver->update(['balance' => $receiver->balance + $amount]);
        $transactionId = uniqid('BPAY-');
        // create transaction
        if($send){
            $UsertransactionData = [
                'user_id' => $user->id,
                'type' => 'debit',
                'amount' => $amount,
                'description' => $Userdescription,
                'status' => true,
                'transaction_id' => $transactionId,
                'to' => $receiver->id,
                'from' => null
            ];
            $Usertransaction = Transaction::create($UsertransactionData);
        }
        if($receive){
            $ReceivertransactionData = [
                'user_id' => $receiver->id,
                'type' => 'credit',
                'amount' => $amount,
                'description' => $Receiverdescription,
                'status' => true,
                'transaction_id' => $transactionId,
                'to' => null,
                'from' => $user->id
            ];
            $Receivertransaction = Transaction::create($ReceivertransactionData);
        }
        if($Usertransaction && $Receivertransaction){
            notify()->success('Transfer Initiated and Completed ⚡️', 'Success');
            return redirect()->route('dashboard');
        }
        else{
            notify()->error('Transfer Failed', 'Error');
            return redirect()->route('dashboard');
        }

    }

    public function ActivateAccount(){
        $paymentData = [
            'email' => auth()->user()->email,
            'amount' => 1000,
            'name' => auth()->user()->first_name . ' ' . auth()->user()->last_name,
            'phone' => auth()->user()->phone_number,
        ];
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $paymentData['amount'],
            'email' => $paymentData['email'],
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $paymentData['email'],
                "phone_number" => $paymentData['phone'],
                "name" => $paymentData['name']
            ],

            "customizations" => [
                "title" => 'B-Pay Registration Fee',
                "description" => "Registration Fee"
            ]
        ];

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    public function callback()
    {

        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {

        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);
        $user = User::whereId(auth()->user()->id)->first();
        // Check if this user was refered
        $referrer = ReferalHistory::whereReferredId(auth()->user()->id)->first();
        if($referrer){
            $referrer = User::whereId($referrer->referal_id)->first();
            $referrer->update(['balance' => $referrer->balance + 400]);
            $user->update(['balance' => $user->balance + 100]);
            $referralTransactionData = [
                'user_id' => $referrer->id,
                'type' => 'credit',
                'amount' => 400,
                'description' => 'Referral Bonus for ' . $user->first_name . ' - ' . $user->last_name,
                'status' => true,
                'transaction_id' => uniqid('BPAY-'),
                'to' => null,
                'from' => null
            ];
            Transaction::create($referralTransactionData);
            $UserTransactionData = [
                'user_id' => $user->id,
                'type' => 'credit',
                'amount' => 100,
                'description' => 'Registration Bonus',
                'status' => true,
                'transaction_id' => uniqid('BPAY-'),
                'to' => null,
                'from' => null
            ];
            Transaction::create($UserTransactionData);
        }
        else{
            $user->update(['balance' => $user->balance + 200]);
            $UserTransactionData = [
                'user_id' => $user->id,
                'type' => 'credit',
                'amount' => 200,
                'description' => 'Registration Bonus',
                'status' => true,
                'transaction_id' => uniqid('BPAY-'),
                'to' => null,
                'from' => null
            ];
            Transaction::create($UserTransactionData);
        }
        $user->update(['is_active' => true]);
        
        notify()->success('Account Activated Successfully', 'Success');
        return redirect()->route('dashboard');
        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
        }
        else{
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
