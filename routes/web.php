<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\FrontendController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::get('profile', function(){
        return "halaman profile admin";
    });
    Route::resource('merk', MerkController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('stoks', StokController::class);
    Route::resource('pelanggans', PelangganController::class);
    Route::resource('pakaians', PakaianController::class);
    Route::resource('keranjangs', KeranjangController::class);
    Route::resource('pembelians', PembelianController::class);
    Route::resource('pembayarans', PembayaranController::class);

});

Route::group(['prefix' => 'pengguna', 'middleware' => ['auth', 'role:pengguna']], function(){
    Route::get('/', function () {
        return 'halaman pengguna';
    });

    Route::get('profile', function(){
        return "halaman profile pengguna";
    });
});

Route::resource('/', FrontendController::class);
// Route::get('detail', [App\Http\Controllers\FrontendController::class, 'show'])->name('detailbarang');
// Route::resource('detail', FrontendController::class);
Route::get('detail', FrontendController::class);

// Route::get('/detailbarang', function () {
//     return view('frontend.detailbarang');
// });
// Route::group(['prefix' => '/', 'middleware' => ['auth', 'role:pengguna']], function(){

// });
// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
//     Route::get('buku', function () {
//         return view ('buku.index');
//     })->middleware(['role:admin|pengguna']);

//     Route::get('pengarang', function(){
//         return view ('pengarang.index');
//     })->middleware(['role:admin']);
// });

