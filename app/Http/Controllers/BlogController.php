<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('blogs.index',[
            'blogs' => Blog::with(['category','author'])
                            ->filter(request(['search','category','author']))
                            ->paginate()
                            ->withQueryString(),
            'categories' => Category::all(),
            'currentCategory' =>  Category::where('slug', request('category'))
                                            ->first()
        ]);
    }

    public function show(Blog $blog) {
        return view('blogs.show',[
            'blog' => $blog,
            'randomBlogs' => Blog::with(['category','author'])
                                    ->inRandomOrder()
                                    ->take(3)
                                    ->get()
        ]);
    }

    public function subscribeHandler (Blog $blog) {
            if(auth()->user()->isSubscribed($blog)) {
                $blog->unSubscribe();
            } else {
                $blog->subscribe();
            }

            return back();
    }



}
