<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    /**
     * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['name', 'users_id', 'email', 'telepon', 'alamat'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function servis()
    {
        return $this->hasOne(Servis::class);
    }
}
