<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
       //
       protected $table = 'team';
       /**
        * The attributes that are mass assignable.
        *
        * @var array
        */
       protected $fillable = [
        'nik',
        'foto',
        'nama',
        'alamat',
        'email',
        'telepon',
        'dept_id',
        'devisi_id',
        'users_id',
    ];

       public function getGambar(){
           if(!$this->gambar){
               return asset('image/avatar.jpeg');
           }
           return asset('image/' .$this->gambar);
       }
       public function dept()
       {
           return $this->belongsTo(Dept::class);
       }
       public function devisi()
       {
           return $this->belongsTo(Devisi::class);
       }
       public function users()
       {
           return $this->belongsTo(User::class);
       }
       public function jasa()
       {
           return $this->hasOne(Jasa::class);
       }
}
