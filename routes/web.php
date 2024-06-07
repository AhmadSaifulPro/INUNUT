<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CariTumpangan;
use App\Http\Controllers\DetailTumpanganController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NumpangController;
use App\Http\Controllers\ProfileSiswa;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TumpanganAdminController;
use App\Http\Controllers\TumpanganController;
use App\Http\Controllers\MapController;
use Illuminate\Auth\Events\Login;
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
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('do_login', 'do_login')->name('do_login');
    Route::get('loginsiswa', 'loginsiswa')->name('loginsiswa');
    Route::post('do_loginsiswa', 'do_loginsiswa')->name('do_loginsiswa');

    Route::post('logout', 'logout')->name('logout');
    Route::post('logoutsiswa', 'logoutsiswa')->name('logoutsiswa');
});

Route::middleware(['admin'])->group(function () {

    Route::resource('inunut', SiswaController::class);
    Route::resource('tumpangan-admin', TumpanganAdminController::class);
    // Route::resource('DetailTumpangan', DetailTumpanganController::class);
});

Route::middleware(['siswa'])->group(function () {

    Route::resource('profile_siswa', ProfileSiswa::class);
    Route::resource('DetailTumpangan', DetailTumpanganController::class);
    Route::resource('tumpangan', TumpanganController::class);
    Route::post('nebeng/{id}', [TumpanganController::class, 'nebeng'])->name('nebeng');
    Route::resource('cari_tumpangan', CariTumpangan::class);
});


Route::resource('landing-page', LandingController::class);

Route::get('map', [MapController::class, 'index']);
