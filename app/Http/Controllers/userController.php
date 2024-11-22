<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\userLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\user\userRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
}

