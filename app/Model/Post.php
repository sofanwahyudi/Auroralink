<?php

namespace App\Model;

use App\User;
use App\Model\Category;
use App\Model\Comment;
use Carbon\Carbon;
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
    // public function comments()
    // {
    //     return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    // }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function getGambar()
    {
        if(!$this->gambar){
            return asset('image/dash.jpeg');
        }
        return asset('image/upload/' .$this->image);
    }
    public function scopePopular($query){
        return $query->orderBy('view_count', 'desc');
    }
    public function scopePublished($query){
		return $query->where("published_at", "<=", Carbon::now());
	}
    public function getImageThumbUrlAttribute($value){

        $imageUrl = "";
        if(!is_null($this->image)){
            $ext = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/img/" . $thumbnail;
            if(file_exists($imagePath)) $imageUrl = asset("img/" . $thumbnail);
            $imageUrl = $this->image;
        }else{
            $imageUrl = "";
        }

        return $imageUrl;
    }
}
