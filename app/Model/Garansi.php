<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Garansi extends Model
{
         //
         protected $table = 'garansi';
         /**
          * The attributes that are mass assignable.
          *
          * @var array
          */
         protected $fillable = ['nama'];

         public function servis()
         {
             return $this->hasOne(Servis::class);
         }
}
