<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArsipsuratController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', [HomeController::class, 'index'], function () {
    return view('dashboard');
});

// ================================= Arsip ===============================================================
Route::controller(ArsipsuratController::class)->prefix('arsip')->group(function () {
    Route::get('', 'index')->name('arsip');
    Route::get('create', 'create')->name('arsip.create');
    Route::post('store', 'store')->name('arsip.store');
    Route::delete('destroy/{id}', 'destroy')->name('arsip.destroy');
    Route::get('download/{id}', 'download')->name('arsip.download');
    Route::get('show/{id}', 'show')->name('arsip.show');
    Route::get('unduh/{id}', 'unduh')->name('arsip.unduh');
    Route::get('edit/{id}', 'edit')->name('arsip.edit');
    Route::put('edit/{id}', 'update')->name('arsip.update');
    // Route::get('edit/{id}', 'edit')->name('arsip.edit');
    // Route::put('edit/{id}', 'update')->name('arsip.update');
});
// =======================================================================================================
// ================================= Kategori ===============================================================
Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
    Route::get('', 'index')->name('kategori');
    Route::get('create', 'create')->name('kategori.create');
    Route::post('store', 'store')->name('kategori.store');
    Route::get('show/{id}', 'show')->name('kategori.show');
    Route::get('edit/{id}', 'edit')->name('kategori.edit');
    Route::put('edit/{id}', 'update')->name('kategori.update');
    Route::delete('destroy/{id}', 'destroy')->name('kategori.destroy');
});
// =======================================================================================================
// ================================= About ===============================================================
Route::controller(AboutController::class)->prefix('about')->group(function () {
    Route::get('', 'index')->name('about');
});
// =======================================================================================================
