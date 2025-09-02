<?php

use App\Http\Controllers\KriteriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard', function () {
    return view('contents.dashboard');
})->name('dashboard');
Route::controller(KriteriaController::class)->group(function () {
    Route::get('kriteria', 'index')->name('kriteria.index');
    Route::get('kriteria/create', 'create')->name('kriteria.create');
    Route::post('kriteria', 'store')->name('kriteria.store');
    Route::get('kriteria/{id}/edit', 'edit')->name('kriteria.edit');
    Route::put('kriteria/{id}', 'update')->name('kriteria.update');
    Route::delete('kriteria/{id}', 'destroy')->name('kriteria.destroy');
});
