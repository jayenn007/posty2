<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;



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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'signin']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/post', [PostController::class, 'index'])->name('posts');
Route::post('/post', [PostController::class, 'store']);

Route::post('/post/{post}', [PostLikeController::class, 'store'])->name('post.likes');
Route::delete('/post/{post}', [PostLikeController::class, 'destroy'])->name('post.likes');



Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('home');
});
