<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriSampahController;
use App\Http\Controllers\SampahMasukController;
use App\Http\Controllers\KerajinanKeluarController;
use App\Http\Controllers\KerajinanMasukController;
use App\Http\Controllers\SatuanSampahController;
use App\Http\Controllers\ProdukSampahController;
use App\Http\Controllers\SampahJualController;
use App\Http\Controllers\KerajinanJualController;
use App\Http\Controllers\SampahMasukViewController;
use App\Http\Controllers\AboutController;



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


Route::resource('sampah_masuk', 'SampahMasukController');
Route::resource('sampah_jual', 'SampahJualController');
Route::resource('kerajinan_jual', 'KerajinanJualController');



//Route Baru Zidni
Route::resource('kategori_sampah', KategoriSampahController::class);
Route::resource('produk_sampah', ProdukSampahController::class);
Route::resource('kerajinan_keluar', KerajinanKeluarController::class);
Route::resource('kerajinan_masuk', KerajinanMasukController::class);
Route::get('/kategori-sampah/create', [KategoriSampahController::class, 'create'])->name('kategori_sampah.create');
Route::resource('satuan_sampah', SatuanSampahController::class);

Route::get('/api/check-sampah-masuk/{kodeBarang}', [KerajinanKeluarController::class, 'checkSampahMasuk']);

Route::post('/check-sampah-masuk', [KerajinanKeluarController::class, 'checkSampahMasuk']);

Route::post('/verify_kode_barang', [KerajinanKeluarController::class, 'verifyKodeBarang']);
Route::post('/verify_kode_jual', [SampahJualController::class, 'verifyKodeSampahJual']);
Route::post('/verify_kode_jual_kerajinan', [KerajinanJualController::class, 'verifyKodeKerajinanJual']);
Route::post('/kerajinan_keluar/store', [KerajinanKeluarController::class, 'store']);



route::post('/get_pembuat', [KerajinanJualController::class, 'getPembuat'])->name('get_pembuat');

Route::get('/home_user', 'Home_userController@index')->name('home_user');
Route::resource('sampah_masuk_view', SampahMasukViewController::class);
Route::resource('kerajinan_masuk_view', KerajinanMasukViewController::class);
Route::get('/about_view', [App\Http\Controllers\AboutController::class, 'index'])->name('about_view');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');
