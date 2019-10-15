<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
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
}
