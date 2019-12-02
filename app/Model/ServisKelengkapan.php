<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ServisKelengkapan extends Model
{
    protected $table = 'servis_kelengkapan';
    protected $fillable = array('servis_detail_id','kelengkapan_id');

    public function servis()
    {
        return $this->belongsToMany(ServisItem::class,'servis_kelengkapan','servis_detail_id','kelengkapan_id');
    }
}
