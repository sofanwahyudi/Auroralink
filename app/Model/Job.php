<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama','deskripsi'];

    public function jasa()
    {
        return $this->hasOne(Jasa::class);
    }
    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
