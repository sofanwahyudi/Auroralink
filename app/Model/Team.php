<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Team extends Model
{
    use HasRoles;
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
}
