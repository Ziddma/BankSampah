<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriSampahController;
use App\Http\Controllers\SampahMasukController;
use App\Http\Controllers\KerajinanKeluarController;
use App\Http\Controllers\KerajinanMasukController;
use App\Http\Controllers\SampahKeluarController;
use App\Http\Controllers\SatuanSampahController;




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

Route::get('/sampah', 'SampahMasukController@index')->name('sampah-masuk.index');

// Route::get('/sampah/create', 'SampahController@create')->name('sampah.create');
// Route::post('/sampah', 'SampahController@store')->name('sampah.store');
// Route::get('/sampah/{id}/edit', 'SampahController@edit')->name('sampah.edit');
// Route::put('/sampah/{id}', 'SampahController@update')->name('sampah.update');


Route::resource('sampah', 'SampahMasukController');



//Route Baru Zidni
Route::resource('kategori_sampah', KategoriSampahController::class);
Route::resource('sampah-masuk', SampahMasukController::class);
Route::resource('kerajinan_keluar', KerajinanKeluarController::class);
Route::resource('kerajinan_masuk', KerajinanMasukController::class);
Route::resource('sampah-keluar', SampahKeluarController::class);
Route::get('/kategori-sampah/create', [KategoriSampahController::class, 'create'])->name('kategori_sampah.create');
Route::resource('satuan_sampah', SatuanSampahController::class);






Route::get('/about', function () {
    return view('about');
})->name('about');
