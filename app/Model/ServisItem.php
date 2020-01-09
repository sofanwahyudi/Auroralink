<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ServisItem extends Model
{
    protected $table ='item_servis';

    protected $fillable =[
        'servis_id'
    ];

    public function servis()
    {
        return $this->belongsToMany(Servis::class, 'servis_id');
    }
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id');
    }
    public function perlengkapan()
    {
        return $this->belongsToMany(Kelengkapan::class);
    }
    public function garansi()
    {
        return $this->belongsTo(Garansi::class, 'garansi_id');
    }
}
