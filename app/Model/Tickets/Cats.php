<?php

namespace App\Model\Tickets;

use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    protected $table = 'tickets_categories';
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
        return $this->hasMany(Tickets::class, 'cats_id');
    }
}
