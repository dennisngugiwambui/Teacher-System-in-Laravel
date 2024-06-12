<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome')->name('home');
//});

Route::get('/', [App\Http\Controllers\Api\AuthController::class, 'index'])->name('index');

Route::get('/home',[App\Http\Controllers\Api\AuthController::class, 'home'])->name('home')->middleware('auth');

Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');

Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);

Route::get('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

//// Post
//Route::post('posts/create', [App\Http\Controllers\Api\PostController::class, 'create'])->middleware('jwtAuth');
//Route::post('posts/edit', [App\Http\Controllers\Api\PostController::class, 'update'])->middleware('jwtAuth');
//Route::post('posts/delete', [App\Http\Controllers\Api\PostController::class, 'delete'])->middleware('jwtAuth');
//Route::get('posts', [App\Http\Controllers\Api\PostController::class, 'posts'])->middleware('jwtAuth');
//
//// Comments
//Route::post('comments/create', [App\Http\Controllers\Api\CommentController::class, 'create'])->middleware('jwtAuth');
//Route::post('comments/edit', [App\Http\Controllers\Api\CommentController::class, 'update'])->middleware('jwtAuth');
//Route::post('comments/delete', [App\Http\Controllers\Api\CommentController::class, 'delete'])->middleware('jwtAuth');
//Route::get('comments', [App\Http\Controllers\Api\CommentController::class, 'comments'])->middleware('jwtAuth');

