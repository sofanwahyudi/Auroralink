<?php

namespace App\Model\Tickets;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';
    protected $dates = ['completed_at'];

    public function hasComments()
    {
        return (bool) count($this->comments);
    }
    public function isComplete()
    {
        return (bool) $this->completed_at;
    }
    public function scopeComplete($query)
    {
        return $query->whereNotNull('completed_at');
    }
    public function scopeActive($query)
    {
        return $query->whereNull('completed_at');
    }
    public function status()
    {
        return $this->belongsTo('App\Model\Tickets\Status', 'status_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Model\Tickets\Cats', 'cats_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany('App\Model\Tickets\Comment', 'ticket_id');
    }
}
