<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = array('category');

    public function post(){
        return $this->belongsToMany(Post::class, 'post_id', 'tags_id');
    }
}
