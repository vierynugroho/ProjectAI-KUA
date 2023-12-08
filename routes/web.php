<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('beranda');

Route::get('/tentang-kami', function () {
    return view('tentangKami');
});

Route::get('/hubungi-kami', function () {
    return view('hubungiKami');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');


Route::middleware(['auth'])->group(function () {
    Route::resource('/data', DataController::class);
    Route::post('/data/{id}', [DataController::class, 'DataController@akurasi'])->name('actionAkurasi');
    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
});

// route login sementara
Route::get('/masuk', function () {
    return view('login');
});