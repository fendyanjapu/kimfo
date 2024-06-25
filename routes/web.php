<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RfkProgramController;

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
    return view('login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-aksi', [LoginController::class, 'loginAksi'])->name('login-aksi');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['ceklog']], function(){
   Route::get('/', [AdminController::class, 'index'] )->name('indexAdmin');
   Route::resource('rfk_program', RfkProgramController::class);
   Route::get('/rfk_kegiatan', [AdminController::class, 'rfk_kegiatan'] )->name('rfk_kegiatan');
   Route::get('/rfk_subkegiatan', [AdminController::class, 'rfk_subkegiatan'] )->name('rfk_subkegiatan');
   Route::get('/uraian_subkegiatan', [AdminController::class, 'uraian_subkegiatan'] )->name('uraian_subkegiatan');
   Route::get('/data_pegawai', [AdminController::class, 'data_pegawai'] )->name('data_pegawai');
});
