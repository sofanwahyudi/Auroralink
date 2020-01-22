<?php

namespace App;

use App\Model\Servis;
use App\Model\Tickets\Tickets;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
    public function verifyUser()
    {
    return $this->hasOne('App\Model\VerifyUser');
    }
    // static function hasRole($id, $role){
    //     $user = User::find($id);

    //     if(is_numeric($role)){
    //         foreach ($user->roles as $r) {
    //             // var_dump($r->id);
    //             if($r->id == $role){
    //                 return true;
    //             }
    //             return false;
    //         }
    //     }else{
    //         foreach ($user->roles as $r) {
    //             if($r->name == $role){
    //                 return true;
    //             }
    //             return false;
    //         }

    //     }
    // }
    static function superAdmin(){
        $user = User::find(Auth::user()->id);

            foreach ($user->roles as $r) {
                if($r->id == 2){
                    return true;
                }
                return false;
            }
    }
    static function isAdmin(){
        $user = User::find(Auth::user()->id);

            foreach ($user->roles as $r) {
                if($r->id == 2){
                    return true;
                }
                return false;
            }
    }
}
