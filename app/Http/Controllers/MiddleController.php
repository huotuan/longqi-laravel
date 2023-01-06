<?php

namespace App\Http\Controllers;

class MiddleController extends Controller
{
    public function middle()
    {
        return request()->all();
    }

    public function demo()
    {
    }
}
