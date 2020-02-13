<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $table ='servis';

    protected $fillable =[
        'kode_servis'
    ];

    public function device()
    {
        return $this->hasMany(ServisItem::class);
    }
    public function pelanggan()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo('App\Model\Tickets\Status', 'status_id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
