<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $table ='servis';

    protected $fillable =[
        'kode_servis','pelanggan_id','team_id','status_id','keterangan','recieve_at','completed_at','updated_at',
    ];

    public function device()
    {
        return $this->hasMany(ServisItem::class);
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
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
