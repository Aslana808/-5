<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
    $posts = Post::all();
    return view('test.test', compact('posts'));
});

Route::get('/calculate', [\App\Http\Controllers\TestController::class, 'calculate']);

Route::get('/test', [\App\Http\Controllers\TestController::class, "test"]);

Route::get('/posts', [\App\Http\Controllers\PostController::class, "index"])->name('posts.index');

Route::get('/posts/list', [\App\Http\Controllers\PostController::class, "postList"])->name('posts.list');

Route::get('/posts/create', [\App\Http\Controllers\PostController::class, "create"]);

Route::get('/posts/{id}',[\App\Http\Controllers\PostController::class, "show"])->name('posts.show');

Route::post('posts.store',[\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{id}/edit',[\App\Http\Controllers\PostController::class, "edit"])->name('posts.edit');

Route::put('/posts/{id}/update',[\App\Http\Controllers\PostController::class, "update"])->name('posts.update');

Route::delete('/posts/{id}/destroy',[\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');


