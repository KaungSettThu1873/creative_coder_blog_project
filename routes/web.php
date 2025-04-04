<?php

use App\Models\Blog;

use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\fileExists;

Route::get('/', function () {

    return view('blogs',[
        'blogs' => Blog::with(['category','user'])->get()
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    // dd($blog);

    return view('blog',[
        'blog' => $blog
    ]);
})->where('slug','[A-z\d\-_]+');

Route::get('/categories/{slug}',function ($slug) {
    $categories = Blog::where('slug',$slug)->get();
    dd($categories);
    // return view('')
});

Route::get('/user/{id}',function($id) {
    return view('user_blog',[
        'blogs'  =>  Blog::with('user')->where('user_id',$id)->get()
    ]);
});
