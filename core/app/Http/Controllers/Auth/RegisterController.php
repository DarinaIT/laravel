<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Settings;
use App\Models\Audit;
use App\Models\Referral;
use App\Models\Devices;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Browser;
use Session;

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
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:user');
    }

    public function register()
    {
        $data['title']='Register';
        $set=Settings::first();
        if($set->registration==1){
            return view('/auth/register', $data);
        }else{
            return back()->with('alert', 'Registration is currently disabled!!!');
        }
    }


    public function submitregister(Request $request)
    {
        $set=Settings::first();
        if($set->recaptcha==1){
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'g-recaptcha-response' => 'required|captcha'
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);
        }
        if ($validator->fails()) {
            // adding an extra field 'error'...
            $data['title']='Register';
            $data['errors']=$validator->errors();
            return view('/auth/register', $data);
        }

        $basic = Settings::first();

        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        $phone_verify = 1;
        $verification_code = strtoupper(Str::random(6));
        $sms_code = strtoupper(Str::random(6));
        $email_time = Carbon::parse()->addMinutes(5);
        $phone_time = Carbon::parse()->addMinutes(5);
        $user = new User();
        $user->image = 'personx.jpg';
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->email_verify = $email_verify;
        $user->wallet = 'enter BSC wallet';
        $user->verification_code = $verification_code;
        $user->sms_code = $sms_code;
        $user->email_time = $email_time;
        $user->phone_verify = $phone_verify;
        $user->phone_time = $phone_time;
        $user->balance = $basic->balance_reg;
        $user->ip_address = user_ip();
        $user->password = Hash::make($request->password);
        if($request->has('ref')){
            $referral = User::whereusername($request->ref)->count();
            if($referral>0){
                $key = User::whereusername($request->ref)->first();
                $user->referral = $key->id;
            }
        }
        $user->save();
        $boom = User::whereusername( $request->username)->first();
        $ip_address=user_ip();
        $sav['user_id']=$boom->id;
        $sav['name']=Browser::userAgent();
        $sav['ip_address']=$ip_address;
        Devices::create($sav);


        if ($basic->email_verification == 1) {
            $text = "Your Email Verification Code Is: <b>$user->verification_code</b>";
            send_email($user->email, $user->name, 'Email verification', $text);
        }

        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            return redirect()->route('user.dashboard');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
