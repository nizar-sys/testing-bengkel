<?php

use App\Http\Controllers\LoginController;
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
    return view('homepage', [
        "title" => "Home"
    ]);
});

Route::get('/cari-bengkel', function () {
    return view('caribengkel', [
        "title" => "Cari Bengkel"
    ]);
});

Route::get('/haversine', function () {
    return view('haversine');
});

Route::get('/login', [LoginController::class, 'index']);