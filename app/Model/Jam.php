<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    //
    protected $table = 'jam';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'jam_start',
        'jam_end',
    ];

    public function jasa()
    {
        return $this->hasOne(Jasa::class);
    }
}
