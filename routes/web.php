<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\KategoriSampahController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/sampah', 'SampahController@index')->name('sampah.index');
Route::get('/sampah/create', 'SampahController@create')->name('sampah.create');
Route::post('/sampah', 'SampahController@store')->name('sampah.store');
Route::get('/sampah/{id}/edit', 'SampahController@edit')->name('sampah.edit');
Route::put('/sampah/{id}', 'SampahController@update')->name('sampah.update');
Route::delete('/sampah/{id}', [SampahController::class, 'destroy'])->name('sampah.destroy');

Route::resource('sampah', 'SampahController');

Route::resource('penjualan', PenjualanController::class);

Route::resource('kategori_sampah', KategoriSampahController::class);

Route::resource('kerajinan', KerajinanController::class);




Route::get('/about', function () {
    return view('about');
})->name('about');
