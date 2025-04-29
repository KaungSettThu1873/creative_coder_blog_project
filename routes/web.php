<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


Route::get('/',[BlogController::class,'index'] );
Route::get('/blogs/{blog:slug}',[BlogController::class,'show']);
Route::get('/register',[AuthController::class,'index'])->name('register.index')->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->name('register.store')->middleware('guest');
Route::get('/login',[AuthController::class,'loginIndex'])->name('login.index')->middleware('guest');
Route::post('/login',[AuthController::class,'login'])->name('login.login')->middleware('guest');

Route::post('/logout',[AuthController::class,'logout'])->name('register.logout')->middleware('auth');



