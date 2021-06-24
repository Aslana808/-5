<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        return view('email.send');
    }

    public function send(Request $request){
        /*  Sending mail to the mailtrap
        Mail::raw('Text', function ($message){
            $message->to('test123@gmail.com');
        });
        echo 'Mail has been sent';
        */
        $user = User::find(2);
        $data = [
            'text' => 'Your order has delivered',
            'user_name' => $user->name
        ];
        Mail::to($request->get('email'))->send(new OrderShipped($data));
        echo 'Mail has been sent';
    }
}
