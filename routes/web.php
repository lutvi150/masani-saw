<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;

Route::get('/demo', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('contents.dashboard');
// })->name('dashboard', );
Route::controller(Dashboard::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::get('dashaboard/get-data', 'get_data')->name('dashboard.get-data');
});
Route::controller(KriteriaController::class)->group(function () {
    Route::get('kriteria', 'index')->name('kriteria.index');
    Route::get('kriteria/create', 'create')->name('kriteria.create');
    Route::post('kriteria', 'store')->name('kriteria.store');
    Route::get('kriteria/{id}/edit', 'edit')->name('kriteria.edit');
    Route::put('kriteria/{id}', 'update')->name('kriteria.update');
    Route::delete('kriteria/{id}', 'destroy')->name('kriteria.destroy');
    // others
    Route::get('kriteria/code', 'kriteria_code')->name('kriteria.code');
});
Route::controller(LokasiController::class)->group(function () {
    Route::get('lokasi', 'index')->name('lokasi.index');
    Route::get('lokasi/create', 'create')->name('lokasi.create');
    Route::post('lokasi', 'store')->name('lokasi.store');
    Route::get('lokasi/{id}/edit', 'edit')->name('lokasi.edit');
    Route::put('lokasi/{id}', 'update')->name('lokasi.update');
    Route::delete('lokasi/{id}', 'destroy')->name('lokasi.destroy');
});
Route::controller(NilaiController::class)->group(function () {
    Route::get('nilai', 'index')->name('nilai.index');
    Route::get('nilai/create', 'create')->name('nilai.create');
    Route::post('nilai', 'store')->name('nilai.store');
    Route::get('nilai/{id}/edit', 'edit')->name('nilai.edit');
    Route::put('nilai/{id}', 'update')->name('nilai.update');
    Route::delete('nilai/{id}', 'destroy')->name('nilai.destroy');
    // other
    Route::post('nilai/update-nilai', 'update_data')->name('nilai.update-data');
    Route::get('nilai/get-nilai', 'get_data')->name('nilai.get-data');
    Route::get('nilai/get-score-mix-max', 'min_max')->name('nilai.get-score-mix-max');
});
