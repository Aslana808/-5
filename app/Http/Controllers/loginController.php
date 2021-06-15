<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\User;
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
            return redirect('/posts');
        }else {
            abort(483);
        }
    }

    public function logout(){
        auth::logout();
        return redirect('/login');
    }

    public function show(){
        return view('users.register');
    }

    public function register(Request $request){
        $post = User::create([
            'name' => $request->get('title'),
            'email' => $request->get('post_text'),
            'phone' => $request->get('phone'),
            'password' => bcrypt($request->get('author_name')),
        ]);
        return redirect()->back();
    }
}
