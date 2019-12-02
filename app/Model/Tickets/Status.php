<?php

namespace App\Model\Tickets;

use App\Model\Servis;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'tickets_statuses';
    protected $fillable = ['name', 'color'];

        /**
     * Indicates that this model should not be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * Get related tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(Tickets::class, 'status_id');
    }
    public function servis()
    {
        return $this->hasMany(Servis::class, 'status_id');
    }
}
