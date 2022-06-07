<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', [HomeController::class, 'profile'])->name('profile');
Route::get('/profile-edit/{id}', [HomeController::class, 'editProfile'])->name('edit');
Route::put('/profile-update/{id}', [HomeController::class, 'updateProfile'])->name('update');

Route::resource('post', PostController::class);

Route::resource('comments', CommentController::class)->only(['store']);

Route::post('save-likedislike', 'PostController@save_likedislike');
