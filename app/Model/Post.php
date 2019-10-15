<?php

namespace App\Model;

use App\User;
use App\Model\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';
    /**
     * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['title', 'user_id', 'image', 'content', 'slug'];
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
