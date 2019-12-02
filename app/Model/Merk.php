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
     protected $fillable = ['name'];

     public function part()
     {
         return $this->hasOne(Part::class);
     }
     public function models()
     {
         return $this->hasOne(Models::class);
     }
     public function item()
    {
        return $this->belongsToMany(ServisItem::class);
    }
}
