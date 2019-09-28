<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Devisi extends Model
{
    protected $table = 'devisi';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','keterangan'];

    public function team()
    {
        return $this->hasOne(Team::class);
    }
}
