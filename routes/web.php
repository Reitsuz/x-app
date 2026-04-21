<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::get('/login',[AuthController::class,'loginPage']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',[AuthController::class,'registerPage']);
Route::post('/register',[AuthController::class,'register']);

Route::get('/logout',[AuthController::class,'logout']);


/*
|--------------------------------------------------------------------------
| Timeline
|--------------------------------------------------------------------------
*/

Route::get('/',[PostController::class,'timeline']);

Route::post('/post',[PostController::class,'post']);

Route::post('/like/{id}',[PostController::class,'like']);

Route::post('/repost/{id}',[PostController::class,'repost']);

Route::post('/reply/{id}',[PostController::class,'reply']);


/*
|--------------------------------------------------------------------------
| Follow
|--------------------------------------------------------------------------
*/

Route::post('/follow/{id}',[FollowController::class,'follow']);
Route::post('/unfollow/{id}',[FollowController::class,'unfollow']);


/*
|--------------------------------------------------------------------------
| Notifications
|--------------------------------------------------------------------------
*/

Route::get('/notifications',[NotificationController::class,'index']);
Route::post('/notifications/{id}',[NotificationController::class,'read']);