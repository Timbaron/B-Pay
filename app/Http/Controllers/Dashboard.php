<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
