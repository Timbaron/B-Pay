<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ReferalHistory;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'Dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            // 'other_name' => ['required', 'string', 'max:255'],
            // 'username' => ['required', 'string', 'max:255'],
            'phone_number' => ['required','min:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referal_id' => ['sometimes']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $account_number = rand(1234567890,9999999999);
        // dd($account_number);
        $checker = DB::select('select * from users where acct_number = "$account_number"');
        if($checker == true){
            return redirect()->back()->compact('acct_number_error','Error encounted during registration,please try again after 10 Seconds.');
        }
        else{
            $data['acct_number'] = $account_number;
            // User::create($data);
            $affiliateId = bin2hex(random_bytes(8));
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'acct_number' => $data['acct_number'],
                'password' => Hash::make($data['password']),
                'affiliate_id' => $affiliateId
            ]);
            if($user){
                if(isset($data['referal_id'])){
                    $affiliateId = $data['referal_id'];
                    $affiliateUser = User::where('affiliate_id', $affiliateId)->first();
                    if($affiliateUser){
                        ReferalHistory::create([
                            'referal_id' => $affiliateUser->id,
                            'referred_id' => $user->id,
                            'is_verified' => false,
                            'status' => 'inactive'
                        ]);
                    }
                }
                return $user;
            }
        }

    }
}
