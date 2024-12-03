<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\resetPasswordMail;
use App\Http\Requests\user\userLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\user\userRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReserPassword;
use Illuminate\Auth\Notifications\ResetPassword;

class userController extends Controller
{
    public function register(userRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('user.login');
    }
    public function login(userLoginRequest $request){
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if(auth()->guard('web')->attempt($credentials)){
            $user = auth()->guard('web')->user();
            if(!$user->hasRole('user')){
                $user->assignRole('user');
                
                
            }if(!$user->hasPermissionTo('Manage all business transactions')){
                $user->givePermissionTo('Manage all business transactions');
            }
            session(['user' => $user]);
            return redirect()->route('user.profile', compact('user'));
          
            
        }
           
        return redirect()->back()->withErrors(['login' => 'Invalid email or password.']);
    }

    public function logout($id){
        $user = Crypt::decrypt($id);
        $user = User::find($user);
        auth()->guard('web')->logout();
        return redirect()->route('user.login');
    }

    public function requestResetPasswordMail(){
        return view('user.resetPasswordMail');
    }

    public function resetPasswordMail(resetPasswordMail $request){
        $user = User::where('email', $request->email)->first();

        if($user){
            $token = str::random(64);
            $user->password_reset_token = $token;
            $user->save();
    
            Mail::to($user->email)->send(new ReserPassword($user, $token));
            return redirect()->back()->with('message', 'Password reset link sent to your email!');

        }else{
            return redirect()->back()->with('message', 'Server can not find '.$request->email);

        }
    }

    public function viewResetForm($token){
        $user = User::where('remember_token', $token)->first();
        if($user){
            $user->password_reset_token = 'null';
            $user->save();
            return view('user.resetPassword',compact('user'));
        } else {
            return redirect()->route('user.login');
        }
    }

    public function resetedPassword(Request $request){
        $request->validate([
            'user_id' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::find(Crypt::decrypt($request->user_id));

        if($user){
            $user->update([
                'password' => $request->password,
            ]);
            return redirect()->route('user.login')->with('message', 'successfully reset password');

        }else{
            return redirect()->route('forgotmailSend');
        }
       
    }
}

