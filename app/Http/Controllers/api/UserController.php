<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email);
        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('mobile');
        } else {
            return error('provided credensial is invalid');
        }
    }
}
