<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
        //
        protected $table = 'leads';
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['nama', 'email'];

}
