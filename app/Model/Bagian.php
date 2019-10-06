<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'bagian';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama','devisi_id'];

    public function devisi()
    {
        return $this->belongsTo(Devisi::class);
    }
}
