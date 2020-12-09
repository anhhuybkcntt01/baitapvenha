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
    return view('welcome');
});

Route::get('/home',[\App\Http\Controllers\HomeController::class,'index']);


Route::get('/post/create',[\App\Http\Controllers\PostController::class,'create'])->name('post.create');
Route::post('/post',[\App\Http\Controllers\PostController::class,'store'])->name('post.store');
