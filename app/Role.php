<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_role','id_role','id_permission');
    }
    public function users(){
        return $this->hasMany('App\User');
    }
}
