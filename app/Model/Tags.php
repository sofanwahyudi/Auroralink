<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = array('tags');

    public function post(){
        return $this->belongsToMany(Post::class, 'post_tags','post_id','tags_id');
    }
}
