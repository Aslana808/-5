<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /*
    რადგანაც ერთი კომენტარი ერთ პოსტთანაა დაკავშირებული(მაგრამ ერთი პოსტი რამდენიმე კომენტართან), ამიტომ აქ ფუნქციის
    სახელს ვწერთ მხოლობითში(რელაცია one-to-many).
    */
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
