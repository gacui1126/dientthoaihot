<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','product_code','id_type','id_user','description','unit_price','image','unit','new','image_path'];
    protected $Table = "products";

    public function product_type(){
        return $this->belongsTo('App\Category','id_type','id');
    }
    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }

    public function comments(){
        return $this->hasMany('App\Comment','id_product','id')->whereNull('parent_id');
    }
}
