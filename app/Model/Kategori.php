<?php

namespace App\Model;

use App\Model\Part;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
     //
     protected $table = 'kategori';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = ['nama', 'deskripsi'];

     public function part()
     {
         return $this->hasOne(Part::class);
     }
}
