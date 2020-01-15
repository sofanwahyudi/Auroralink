<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $table='galery';
    protected $fillable = ['title','deskripsi','gambar','url'];

    public function getGambar(){
        if(!$this->gambar){
            return asset('image/dash.jpeg');
        }
        return asset('image/' .$this->gambar);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
