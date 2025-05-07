<?php

namespace App\Models;


use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query,$filter) {

        $query->when($filter['search']??false,function($query,$search)  {
            $query->where(function($query) use($search) {
                $query->where('title','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%');
            });
        });

        $query->when($filter['category']??false,function($query,$slug)  {
            $query->whereHas('category',function($query) use ($slug) {
                $query->where('slug',$slug);
            });
        });


        $query->when($filter['author']??false,function($query,$name)  {
            $query->whereHas('author',function($query) use ($name) {
                $query->where('name',$name);
            });
        });

    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function subscribers() {
        return $this->belongsToMany(User::class);
    }

    public function unSubscribe() {
        $this->subscribers()->detach(auth()->user()->id);
    }


    public function subscribe() {
        $this->subscribers()->attach(auth()->user()->id);
    }

}
