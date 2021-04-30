<?php

use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfilController;

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
    return view('welcome');
});
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
//auth route for both
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/dashboard/user', 'App\Http\Controllers\DashboardController@user')->name('dashboard.user');
    Route::get('/dashboard/spp', 'App\Http\Controllers\DashboardController@spp')->name('dashboard.spp');
    Route::get('/dashboard/kelas', 'App\Http\Controllers\DashboardController@kelas')->name('dashboard.kelas');
    Route::get('/dashboard/petugas', 'App\Http\Controllers\DashboardController@petugas')->name('dashboard.petugas');
    Route::get('/dashboard/siswa', 'App\Http\Controllers\DashboardController@siswa')->name('dashboard.siswa');
    Route::get('/dashboard/pembayaran/{id}', 'App\Http\Controllers\PembayaranController@pembayaran')->name('dashboard.pembayaran');
    Route::get('/dashboard/pembayaran/add/{id}', 'App\Http\Controllers\PembayaranController@tambahpembayaran')->name('dashboard.pembayaran.add');
    Route::post('/pembayaran/insert/{id}',[PembayaranController::class,'insert'])->name('pembayaran.insert');
    Route::get('/dashboard/pembayaran/edit/{id_pembayaran}/{id}',[PembayaranController::class,'edit'])->name('pembayaran.edit');
    Route::post('/dashboard/pembayaran/update/{id_pembayaran}/{id}',[PembayaranController::class,'update'])->name('dashboard.update');
    Route::get('/dashboard/pembayaran/delete/{id_pembayaran}',[PembayaranController::class,'delete']);
    Route::get('/pembayaran/print/{id}',[PembayaranController::class,'print']);
    Route::get('/pembayaran/pdf',[PembayaranController::class,'pdf']);
    Route::delete('myproductsDeleteAll', [PembayaranController::class,'deleteAll']);
    Route::get('/dashboard/profil', [ProfilController::class,'myprofile'])->name('dashboard.profil');
    Route::get('/dashboard/editprofil',[ProfilController::class,'editprofil'])->name('dashbord.edit.profil');
    Route::post('/dashboard/updateprofil',[ProfilController::class,'updateprofil'])->name('dashboard.update.profil');

});
// for users
Route::group(['middleware' => ['auth', 'role:user']], function() {
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::get('/dashboard/data_transaksi', [DashboardController::class,'data'])->name('data');
});

// for petugas
Route::group(['middleware' => ['auth', 'role:petugas']], function() {
    Route::get('/data_pembayaran',[DashboardController::class,'data_transaksi'])->name('data.transaksi');
    Route::get('/dashboard/petugas/pembayaran/{id}',[PetugasController::class,'pembayaran'])->name('petugas.pembayaran');
    Route::get('/dashboard/petugas/pembayaran/add/{id}', 'App\Http\Controllers\PetugasController@tambahpembayaran')->name('petugas.dashboard.pembayaran.add');
    Route::post('/dashboard/petugas/pembayaran/insert/{id}',[PetugasController::class,'insert'])->name('petugas.pembayaran.insert');
    Route::get('/dashboard/petugas/pembayaran/edit/{id_pembayaran}/{id}',[PetugasController::class,'edit'])->name('petugas.pembayaran.edit');
    Route::post('/dashboard/petugas/pembayaran/update/{id_pembayaran}/{id}',[PetugasController::class,'update'])->name('petugas.dashboard.update');
    Route::get('/dashboard/petugas/pembayaran/delete/{id_pembayaran}',[PembayaranController::class,'delete']);
    Route::get('/petugas/pembayaran/print/{id}',[PembayaranController::class,'print']);
    Route::get('/petugas/pembayaran/pdf',[PembayaranController::class,'pdf']);
    Route::delete('/petugas/myproductsDeleteAll', [PembayaranController::class,'deleteAll']);
});

require __DIR__.'/auth.php';
