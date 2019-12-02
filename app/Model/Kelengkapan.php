<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kelengkapan extends Model
{
    //
    protected $table = 'kelengkapan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama'];

    public function servisItem()
    {
        return $this->belongsToMany(ServisItem::class, 'servis_kelengkapan','kelengkapan_id');
    }
}
