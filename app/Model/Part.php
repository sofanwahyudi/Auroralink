<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
            //
            protected $table = 'part';
            /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            protected $fillable = ['nama'];

}
