<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_name',
        'post_text'
    ];
    /*
    რელაცია one-to-many(როდესაც მაგალითად ერთ პოსტს აქვს რამდენიმე კომენტარი)
    ასევე აუცილებელია რომ ფუნქციის სახელი იყოს მრავლობითში(comments, როგორც ბაზის სახელი), რადგან ლარაველი მიხვდეს.
    და კიდევ აუცილებელია foreign key - ს ერქვს post_id(რადგან პოსტების ბაზას ვაკავშირებთ), წინააღმდეგ შემთქვევაში hasMany
    ფუნქციას უნდა გავუწეროთ მეორე პარამეტრად foreign keyს სახელი
    */
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
