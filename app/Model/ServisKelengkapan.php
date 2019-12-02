<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ServisKelengkapan extends Model
{
    protected $table = 'kelengkapan_servis_item';
    protected $fillable = array('servis_item_id','kelengkapan_id');

    public function servis()
    {
        return $this->belongsToMany(ServisItem::class,'servis_kelengkapan','servis_item_id','kelengkapan_id');
    }
}
