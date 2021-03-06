<?php

namespace App\Model\Tickets;

use App\Model\Team;
use App\Model\Comment;
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
    public function priority()
    {
        return $this->belongsTo('App\Model\Tickets\Priority', 'priority_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Model\Tickets\Cats', 'cats_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
