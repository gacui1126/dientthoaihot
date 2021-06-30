<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $Table = "bill_details";
    public function product(){
        return $this->belongsTo('App\Product','id_product','id');
    }
    public function bill(){
        return $this->belongsTo('App\Bill','id','id_bill');
    }
}
