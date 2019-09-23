<?php

namespace App\Model;

use App\Supplier;
use App\Model\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Part extends Model
{
    //
    protected $table = 'part';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama'];

    public function getGambar(){
        if(!$this->gambar){
            return asset('image/default.png');
        }
        return asset('image/' .$this->gambar);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
