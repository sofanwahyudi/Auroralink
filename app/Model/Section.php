<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'section';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','sub_title','image','content'];

    public function getGambar(){
        if(!$this->gambar){
            return asset('image/avatar.jpeg');
        }
        return asset('image/' .$this->gambar);
    }
}
