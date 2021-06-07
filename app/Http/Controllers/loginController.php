<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('users.login');
    }

    public function login(loginRequest $request){
        $credentials = $request->except('_token');

        if (auth::attempt($credentials)){
            //dd('you are logged in');
            return redirect('/');
        }else {
            abort(483);
        }
    }

    public function logout(){
        auth::logout();
        return redirect('/login');
    }
}
