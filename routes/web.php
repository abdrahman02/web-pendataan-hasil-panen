<?php

use App\Http\Controllers\DashboardCetakDataController;
use App\Http\Controllers\DashboardFormCetakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardTanamanController;
use App\Http\Controllers\DashboardOverviewController;
use App\Http\Controllers\DashboardProduksiController;
use App\Http\Controllers\DashboardKecamatanController;
use App\Http\Controllers\DashboardTahunPanenController;
use App\Http\Controllers\DashboardKlasifikasiTanamanController;
use App\Http\Controllers\LoginController;

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
    if (auth()->check()) {
        return redirect()->route('kecamatan.index');
    } else {
        return redirect()->route('login.index');
    }
});

Route::get('/home', function () {
    if (auth()->check()) {
        return redirect()->route('kecamatan.index');
    } else {
        return redirect()->route('login.index');
    }
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
});


Route::middleware('auth')->group(function () {
    Route::group(['prefix' => '/dashboard/data'], function () {
        Route::resource('/kecamatan', DashboardKecamatanController::class)->except([
            'create', 'show', 'edit'
        ]);
        Route::resource('/tahun-panen', DashboardTahunPanenController::class)->except([
            'create', 'show', 'edit'
        ]);
        Route::resource('/klasifikasi-tanaman', DashboardKlasifikasiTanamanController::class)->except([
            'create', 'show', 'edit'
        ]);
        Route::resource('/tanaman', DashboardTanamanController::class)->except([
            'create', 'show', 'edit'
        ]);
        Route::resource('/produksi', DashboardProduksiController::class)->except([
            'create', 'edit'
        ]);
    });

    Route::group(['prefix' => '/dashboard/form-cetak'], function () {
        Route::get('/kecamatan', [DashboardFormCetakController::class, 'formCetakKecamatan'])->name('formCetakKecamatan');
        Route::get('/klasifikasi', [DashboardFormCetakController::class, 'formCetakKlasifikasi'])->name('formCetakKlasifikasi');
        Route::get('/tahun-panen', [DashboardFormCetakController::class, 'formCetakTahunPanen'])->name('formCetakTahunPanen');
        Route::get('/tanaman', [DashboardFormCetakController::class, 'formCetakTanaman'])->name('formCetakTanaman');
    });

    Route::group(['prefix' => '/dashboard/cetak-data'], function () {
        Route::get('/cetak-perkecamatan/{kecamatan}', [DashboardCetakDataController::class, 'cetakPerKecamatan'])->name('cetakPerKecamatan');
        Route::get('/cetak-Kecamatan', [DashboardCetakDataController::class, 'cetakKecamatan'])->name('cetakKecamatan');
        Route::get('/cetak-perklasifikasi/{klasifikasi}', [DashboardCetakDataController::class, 'cetakPerKlasifikasi'])->name('cetakPerKlasifikasi');
        Route::get('/cetak-klasifikasi', [DashboardCetakDataController::class, 'cetakKlasifikasi'])->name('cetakKlasifikasi');
        Route::get('/cetak-pertahunpanen/{tahunpanen}', [DashboardCetakDataController::class, 'cetakPerTahunpanen'])->name('cetakPerTahunpanen');
        Route::get('/cetak-tahun-panen', [DashboardCetakDataController::class, 'cetakTahunPanen'])->name('cetakTahunPanen');
        Route::get('/cetak-pertanaman/{tanaman}', [DashboardCetakDataController::class, 'cetakPerTanaman'])->name('cetakPerTanaman');
        Route::get('/cetak-tanaman', [DashboardCetakDataController::class, 'cetakTanaman'])->name('cetakTanaman');
        Route::get('/cetak-keseluruhan', [DashboardCetakDataController::class, 'cetakKeseluruhan'])->name('cetakKeseluruhan');
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
