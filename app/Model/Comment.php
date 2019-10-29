<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    // use SoftDeletes;
    //
    protected $table = 'comments';
    /**
     * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['email','name','body', 'users_id', 'parent_id'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
