<?php

namespace App\Model;

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
}
