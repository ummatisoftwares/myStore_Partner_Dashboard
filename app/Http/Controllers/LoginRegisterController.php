<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StoreSetting;
use App\Models\UserVerify;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('authentication.sign-up');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:250',
            'last_name' => 'nullable|string|max:250',
            'store_name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'phone_number' => 'nullable|numeric|unique:users',
            'password' => 'required|min:8'
        ]);

        $fullName = $request->first_name . ' ' . $request->last_name;

        $user = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'last_login_at' => now(),
            'password' => Hash::make($request->password)
        ]);

        // Create Wallet
        Wallet::create([
            'user_id' => $user->id,
            'total_balance' => 0,
        ]);

        // Create Store
        StoreSetting::create([
            'user_id' => $user->id,
            'store_name' => $request->store_name,
        ]);


        $token = Str::random(64);

        UserVerify::create([
              'user_id' => $user->id,
              'token' => $token
            ]);

        Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });


          return redirect()->route('login')
          ->with([
            'errorMessage' => 'Please verify Email to login.',
          ]);


        // $credentials = $request->only('email', 'password');
        // Auth::attempt($credentials);
        // $request->session()->regenerate();
        // return view('dashboard.index');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('authentication.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            $user = User::where('email', $credentials['email'])->first();
            // Update the last_login_at attribute with the current timestamp
            $user->update(['last_login_at' => now()]);

            return view('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('dashboard.index');
        }

        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    }

     /**
     * Write code for verifyEmailAccount on Method
     *
     * @return response()
     */
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;

            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->email_verified_at = now();
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }


        return redirect()->route('login')
        ->with([
        'message' => $message,
        ]);

    //   return redirect()->route('login')->withError('message', $message);
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

}
