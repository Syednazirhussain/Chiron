<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function submitForgetPasswordForm(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = User::get_quickRandom(60);
        $user = User::where('email',$request->email)->get();
        if(count($user) > 0){
            DB::table('password_resets')->where('email', $request->email)->delete();
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
    
            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
    
            return back()->with('success', 'We have e-mailed your password reset link!');
        }else{
            return back()->with('error', 'We can\'t find a user with that email address.');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function showResetPasswordForm($token = '') {
       return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        
        $checkEmail = DB::table('password_resets')->where('email', $request->email)->first();
        $checkToken = DB::table('password_resets')->where('token', $request->token)->first();
        
        if(!$checkEmail){
            return back()->withInput()->with('error', 'Invalid Email!');
        }
        
        if(!$checkToken){
            return back()->withInput()->with('error', 'Invalid Token!');
        }
        
        $checkEmailAndPassword = DB::table('password_resets')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();
        
        if(!$checkEmailAndPassword){
            return back()->withInput()->with('error', 'Invalid Token!');
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect('/account/login')->with('success', 'Your password has been changed!');
    }
}
