<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        throw  new \Exception('error');
        return 'index';
    }
}
