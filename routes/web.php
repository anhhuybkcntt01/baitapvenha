<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/home',[\App\Http\Controllers\HomeController::class,'index']);


Route::get('/post/create',[\App\Http\Controllers\PostController::class,'createPost'])->middleware(['login','role'])->name('post.create');
Route::post('/post',[\App\Http\Controllers\PostController::class,'storePost'])->name('post.store');


Route::get('/login',function (){
  return view('login');
})->middleware('login')->name('login');

Route::post('/check-login',[\App\Http\Controllers\PostController::class,'checkLogin'])->name('check-login');

Route::resource('posts',\App\Http\Controllers\PostController::class);
