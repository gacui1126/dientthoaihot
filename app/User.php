<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password','id_role','phone','address','image','image_path'
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


    public function roles(){
        return $this->belongsToMany(Role::class,'role_user','id_user','id_role');
    }

    public function checkPermissionAccess($permissionCheck){
        $role = auth()->user()->roles;
        foreach($role as $rl){
            $per = $rl->permissions;
            if($per->contains('key_code',$permissionCheck)){
                return true;
            }
        }
        return false;
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'id_user', 'id');
    }
    public function customer(){
        return $this->hasMany('App\Customer','id_user','id');
    }
}
