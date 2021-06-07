<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /*
    რელაცია many-to-many(ერთ პოსტს შეიძლება ჰქონდეს რამდენიმე თეგი და პირიქით ერთ თეგს შეიძლება ჰქონდეს რამდენიმე პოსტი).
    დაახლოებით მსგავსი ფუნქცია უნდა გავწეროთ პოსტის მოდელშიც(იქაც belongsToMany).
     */
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
