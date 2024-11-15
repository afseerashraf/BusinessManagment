<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\userLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\user\userRequest;
use Illuminate\Support\Facades\Auth;

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

        if(auth()->attempt($credentials)){
            return redirect()->route('customer.index');
        }else{
            return redirect()->route('user.index');
        }
    }
}
