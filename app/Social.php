<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'Social';
    protected $fillable=['id_user','provider_id_user','provider','user'];

}
