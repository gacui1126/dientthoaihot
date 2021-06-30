<?php

namespace App\Http\Controllers;

use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;
use Storage;


class AdminController extends Controller
{
    public function getAdmin(){
        return view('admin.home');
    }
}
