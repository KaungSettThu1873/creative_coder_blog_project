<?php

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\fileExists;

Route::get('/', function () {

    return view('blogs',[
        'blogs' => Blog::with(['category','author'])->get(),
        'categories' => Category::all(),
        'currentCategory' => null
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog',[
        'blog' => $blog,
        'randomBlogs' => Blog::with(['category','author'])->inRandomOrder()->take(3)->get()
    ]);
})->where('slug','[A-z\d\-_]+');

Route::get('/categories/{category:slug}',function (Category $category) {

    return view('blogs',[
        'blogs' =>  $category->blog->load(['category','author']),
        'categories' => Category::all(),
        'currentCategory' =>  $category
    ]);
});

Route::get('/user/{user:name}',function(User $user) {
    return view('blogs',[
        'blogs'  =>  $user->blogs->load(['category','author']),
        'currentCategory' => null
    ]);
});
