<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $Table = "customer";
    public function bill(){
        return $this->hasMany('App\Bill','id','id_customer');
    }
}
