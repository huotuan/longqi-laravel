<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('index', IndexController::class);

Route::get('middle', [\App\Http\Controllers\MiddleController::class, 'middle'])
    ->middleware(['before:1,3', \App\Http\Middleware\AfterMiddle::class]);
