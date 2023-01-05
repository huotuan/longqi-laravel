<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddleController extends Controller
{


    public function middle(){
        return request()->all();
    }

    public function demo()
    {

    }
}
