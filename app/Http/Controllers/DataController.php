<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    public function getData(){
//        $response = Http::post('http://example.com/users', [
//            'name' => 'Steve',
//            'role' => 'Network Administrator',
//        ]);
//        $response = Http::get('http://example.com');

        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        //return $response->status();

        return json_decode($response->getBody());
    }
}
