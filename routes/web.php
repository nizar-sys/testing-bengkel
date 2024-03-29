<?php

use App\Http\Controllers\BengkelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardController1;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/cari-bengkel', function () {
//     return view('caribengkel', [
//         "title" => "Cari Bengkel"
//     ]);
// });

Route::get('/haversine', function () {
    return view('haversine');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Route::get('/dashboard/databengkel', [DashboardController::class, 'show'])->middleware('auth');

Route::resource('bengkels', BengkelController::class)->middleware('auth');

Route::get('/bengkel/databengkel', [BengkelController::class, 'data'])->middleware('auth');

Route::resource('dashboard', DashboardController1::class)->middleware(['auth', 'admin']);

Route::resource('users', UserController::class)->middleware(['auth', 'admin']);

Route::get('/databengkel', [DashboardController1::class, 'data'])->middleware(['auth', 'admin']);
Route::get('/bengkel/cetakpdf', [DashboardController1::class, 'cetakBengkel'])->middleware(['auth', 'admin']);
Route::get('user/cetakpdf', [DashboardController1::class, 'cetakUser'])->middleware(['auth', 'admin']);

Route::get('/browse/bengkels', [BengkelController::class, 'browse'])->middleware('auth');