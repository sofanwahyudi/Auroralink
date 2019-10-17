<?php

namespace App\Model;

use App\User;
use App\Model\Category;
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
    protected $fillable = ['title', 'user_id', 'image', 'content', 'slug', 'category_id'];
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function tags(){
        return $this->belongsToMany(Tags::class);
    }
    public function kategori(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function getGambar(){
        if(!$this->gambar){
            return asset('image/dash.jpeg');
        }
        return asset('image/upload' .$this->image);
    }
}
