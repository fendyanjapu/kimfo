<?php

use App\Http\Controllers\PengendalianController;
use App\Http\Controllers\PenggunaanKasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RfkProgramController;
use App\Http\Controllers\RfkKegiatanController;
use App\Http\Controllers\RfkSubkegiatanController;
use App\Http\Controllers\SelectComboController;
use App\Http\Controllers\UraianSubkegiatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RencanaKasController;

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
   Route::resource('rfk_kegiatan', RfkKegiatanController::class);

   // select input
   Route::post('select-kode-program', [SelectComboController::class,'selectKodeProgram'])->name('selectKodeProgram');
   Route::post('select-program', [SelectComboController::class,'selectProgram'])->name('selectProgram');
   Route::post('select-kegiatan', [SelectComboController::class,'selectKegiatan'])->name('selectKegiatan');
   Route::post('select-kkegiatan', [SelectComboController::class,'selectKkegiatan'])->name('selectKkegiatan');
   Route::post('select-subkegiatan', [SelectComboController::class,'selectSubkegiatan'])->name('selectSubkegiatan');

   // end select input

   Route::resource('rfk_subkegiatan', RfkSubkegiatanController::class);
   Route::resource('uraian_subkegiatan', UraianSubkegiatanController::class);
   Route::resource('pegawai', PegawaiController::class);
   Route::resource('penggunaan_kas', PenggunaanKasController::class);

   Route::get('pengendalian-program', [PengendalianController::class, 'program'] )->name('pengendalianProgram');

    // rencanakas
    Route::prefix('rencana_kas')->group(function () {
        // program
        Route::get('program', [RencanaKasController::class, 'indexProgram'])->name('indexProgram');
        // kegiatan
        Route::get('kegiatan', [RencanaKasController::class, 'indexKegiatan'])->name('indexKegiatan');
        // subkegiatan
        Route::get('subkegiatan', [RencanaKasController::class, 'indexSubkegiatan'])->name('indexSubkegiatan');
        // uraian subkegiatan
        Route::get('uraian-subkegiatan', [RencanaKasController::class, 'indexUraianSubkegiatan'])->name('indexUraianSubkegiatan');
        Route::get('uraian-subkegiatan/tambah', [RencanaKasController::class, 'createUraianSubkegiatan'])->name('createUraianSubkegiatan');
        Route::post('uraian-subkegiatan/proses', [RencanaKasController::class, 'storeUraianSubkegiatan'])->name('storeUraianSubkegiatan');
        Route::get('uraian-subkegiatan/{id}/edit', [RencanaKasController::class, 'editUraianSubkegiatan'])->name('editUraianSubkegiatan');
        Route::put('uraian-subkegiatan/{id}/update', [RencanaKasController::class, 'updateUraianSubkegiatan'])->name('updateUraianSubkegiatan');
        Route::delete('uraian-subkegiatan/{id}/delete', [RencanaKasController::class, 'deleteUraianSubkegiatan'])->name('deleteUraianSubkegiatan');
    });

});
