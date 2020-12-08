<?php

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

Route::get('/', function () {
    return view('index');
});



Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('posts/store', 'App\Http\Controllers\PostsController@store');
Route::post('posts/upload', 'App\Http\Controllers\PostsController@upload')->name('upload');
Route::get('/posts', 'App\Http\Controllers\PostsController@index');
Route::get('/posts/create', 'App\Http\Controllers\PostsController@create');
Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'App\Http\Controllers\PostsController@edit');
Route::put('/posts/{post}/edit', 'App\Http\Controllers\PostsController@update')->name('post.update');
Route::delete('/posts/{post}/delete', 'App\Http\Controllers\PostsController@destroy')->name('post.destroy');
Route::get('/posts/{post}/delete', 'App\Http\Controllers\PostsController@undelete')->name('undelete.del');

Auth::routes();
