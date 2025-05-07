<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;


Route::get('/',[BlogController::class,'index'] )->name('blog.index');
Route::get('/blogs/{blog:slug}',[BlogController::class,'show']);
Route::get('/register',[AuthController::class,'index'])->name('register.index')->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->name('register.store')->middleware('guest');
Route::get('/login',[AuthController::class,'loginIndex'])->name('login.index')->middleware('guest');
Route::post('/login',[AuthController::class,'login'])->name('login.login')->middleware('guest');
Route::post('/logout',[AuthController::class,'logout'])->name('register.logout')->middleware('auth');

Route::post('/blogs/{blog:slug}',[CommentController::class,'store'])->name('comment.store')->middleware('auth');
Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscribeHandler'])->name('blogs.subscribe_handler')->middleware('auth');


Route::prefix('admin')->middleware('can:isAdmin')->group(function() {

    route::get('/index',[AdminBlogController::class,'index'])->name('admin.index');
    route::get('/blogs/create',[AdminBlogController::class,'create'])->name('admin.blog.create');
    route::get('/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit'])->name('admin.blog.edit');
    route::get('/blogs/{blog:slug}/destroy',[AdminBlogController::class,'destroy'])->name('admin.blog.destroy');
    route::post('/blogs/store',[AdminBlogController::class,'store'])->name('admin.blog.store');
    route::post('/blogs/{blog:slug}/update',[AdminBlogController::class,'update'])->name('admin.blog.update');


});



