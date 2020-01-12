<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    //
    protected $table = 'jasa';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'gambar',
        'deskripsi',
        'jam_id',
        'fitur',
        'benefit',
        'harga',
        'job_id',

    ];

    public function getGambar(){
        if(!$this->gambar){
            return asset('image/dash.jpeg');
        }
        // return asset('image/dash.jpeg');
        return asset('image/' .$this->gambar);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function jam()
    {
        return $this->belongsTo(Jam::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
