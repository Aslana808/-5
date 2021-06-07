<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function calculate(Request $request){
        $first_number = $request->numberOne;
        $second_number = $request->numberTwo;
        /*იძულებული გავხდი სიტყვიერად ჩამეწერა action-ები რადგან url-ში შეტანილ + სიმბოლოს
        არ აღიქვამდა ამიტომ გამოვიყენე plus,minus,division,multiply*/
        if($request->action == "plus"){
            return $first_number + $second_number;
        }
        elseif ($request->action == 'minus'){
            return $first_number - $second_number;
        }
        elseif ($request->action == 'multiply'){
            return $first_number * $second_number;
        }
        elseif ($request->action == 'division'){
            return $first_number / $second_number;
        }
        else return "wrong action!";
    }
    public function test(Request $request){
        dd('test page');
    }

}
