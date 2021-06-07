<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthPlace extends Model
{
    use HasFactory;
    /*
    მსგავსი ფუნქცია გვაქვს User მოდელში, სადაც belongsTo მაგივრად ვიყენებთ hasOne ფუნქციას რადგან
    ის მონაცემია primary key ს მქონე და ეს ბაზაა foreign key ს მქონე
    */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
