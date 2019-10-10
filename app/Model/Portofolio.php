<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolio';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','deskripsi','gambar','url'];

    public function getGambar(){
        if(!$this->gambar){
            return asset('image/dash.jpeg');
        }
        return asset('image/' .$this->gambar);
    }
}
