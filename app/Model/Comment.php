<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    //
    protected $table = 'comment';
    /**
     * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['body', 'user_id', 'parent_id', 'commentable_id', 'commentable_type'];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
