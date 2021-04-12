<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $validateData['password'] = bcrypt($request->password);

        $user = User::create($validateData);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response([
           'user' => $user,
            'access_token' => $accessToken
        ]);
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message'=> 'Invalid credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=> auth()->user(), 'access_token' => $accessToken ]);
    }

    public function user(){
        if(!auth()->attempt()){
            return response(['message'=> 'Invalid credentials']);
        };
        
        return response(['user'=> auth()->user()]);
    }
}
