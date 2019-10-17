<?php

namespace App\Model;

use App\Model\Post;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('category');

    public function post(){
        return $this->hasMany(Post::class);
    }
}
