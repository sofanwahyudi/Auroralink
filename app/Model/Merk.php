<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
     //
     protected $table = 'merk';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = ['nama'];

     public function part()
     {
         return $this->hasOne(Part::class);
     }
}
