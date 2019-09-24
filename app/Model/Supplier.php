<?php

namespace App;

use App\Model\Part;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = 'supplier';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'alamat','telepon', 'email','website', 'status'];

    public function part()
    {
        return $this->hasOne(Part::class);
    }

}
