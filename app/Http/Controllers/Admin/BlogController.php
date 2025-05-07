<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index() {

        return view('Admin.index',[
            'blogs' => Blog::with('category')->latest()->paginate(10)
        ]);
    }

    public function create() {
        return view('Admin.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request) {

        $validation = Validator::make($request->all(),[
            'title' => 'required',
            'intro' => 'required',
            'slug' => 'required',
            'img' => 'required|image',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ])->validate();

        $data = [
            'title' => $validation['title'],
            'intro' => $validation['intro'],
            'slug' => $validation['slug'],
            'body' => $validation['body'],
            'category_id' => $validation['category_id']
        ];

        $data['img'] = $request->file('img')->store('images', 'public');
        $data['user_id'] = Auth::user()->id;

        Blog::create($data);
        return redirect()->route('admin.index');
    }

    public function edit(Blog $blog) {

        return view('Admin.edit',[
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request,Blog $blog) {
        $validation = Validator::make($request->all(),[
            'title' => 'required',
            'intro' => 'required',
            'slug' => 'required',
            'img' => 'image|nullable',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')]
        ])->validate();

        $data = [
            'title' => $validation['title'],
            'intro' => $validation['intro'],
            'slug' => $validation['slug'],
            'body' => $validation['body'],
            'category_id' => $validation['category_id']
        ];

        if($request->img) {
            // $blog->img
            Storage::disk('public')->delete($blog->img);

            $data['img'] = $request->file('img')->store('images', 'public');
        }

        $data['user_id'] = Auth::user()->id;

        $blog->update($data);
        return redirect()->route('admin.index');
    }


    public function destroy(Blog $blog) {
        $blog->delete();
    return redirect()->route('admin.index');
    }
}
