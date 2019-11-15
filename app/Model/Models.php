<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
         //
         protected $table = 'model';
         /**
          * The attributes that are mass assignable.
          *
          * @var array
          */
         protected $fillable = ['name'];

         public function merk()
         {
             return $this->belongsTo(Merk::class,'merk_id');
         }
}
