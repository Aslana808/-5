<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($request->get('password'))
        ]);
        return response(['user' => $user]);
    }

    public function login(loginRequest $request){
        if (!auth()->attempt($request->all())){
            return response(['message'=> 'Incorrect credentials, please try again!']);
        }
        $token = auth()->user()->createToken("Api Token")->accessToken;
        return response(['user' => auth()->user(), 'Token' => $token]);
    }
}
