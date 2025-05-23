<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $guarded=[];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function blog () {
        return $this->belongsTo(Blog::class);
    }
}
