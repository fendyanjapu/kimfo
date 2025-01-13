<?php

use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\KinerjaHarianContoller;
use App\Http\Controllers\SasaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RencanaKasController;
use App\Http\Controllers\RfkProgramController;
use App\Http\Controllers\RfkKegiatanController;
use App\Http\Controllers\SelectComboController;
use App\Http\Controllers\KartuKendaliController;
use App\Http\Controllers\PengendalianController;
use App\Http\Controllers\PenggunaanKasController;
use App\Http\Controllers\KinerjaPegawaiController;
use App\Http\Controllers\RfkSubkegiatanController;
use App\Http\Controllers\UraianSubkegiatanController;

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

Route::group(['prefix' => 'pegawai', 'middleware' => ['ceklog']], function() {
    Route::get('/pegawai', [PegawaiController::class, 'index'] )->name('indexPegawai');
    Route::resource('presensi', PresensiController::class);
    Route::resource('kinerja_harian', KinerjaHarianContoller::class);
    Route::resource('sasaran', SasaranController::class)->except('show');
    Route::resource('indikator', IndikatorController::class);
});

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
   Route::resource('user', UserController::class);
   Route::resource('penggunaan_kas', PenggunaanKasController::class);
   Route::resource('kinerja_pegawai', KinerjaPegawaiController::class);
   Route::resource('jabatan', JabatanController::class)->except('show');
   

   Route::get('iku/index/{i}', [IkuController::class, 'index'])->name('iku.index');
   Route::get('iku/download/{iku}', [IkuController::class, 'download'])->name('iku.download');

   Route::resource('iku', IkuController::class)->except('index','create','edit', 'update');

   Route::get('pengendalian-program', [PengendalianController::class, 'program'] )->name('pengendalianProgram');
   Route::get('pengendalian-kegiatan', [PengendalianController::class, 'kegiatan'] )->name('pengendalianKegiatan');
   Route::get('pengendalian-subkegiatan', [PengendalianController::class, 'subkegiatan'] )->name('pengendalianSubkegiatan');
   Route::get('pengendalian-uraian-subkegiatan', [PengendalianController::class, 'uraian_subkegiatan'] )->name('pengendalianUraianSubkegiatan');

   Route::get('kartu-kendali', [KartuKendaliController::class, 'index'] )->name('kartuKendali');
   Route::get('kartu-kendali-show/{id_uraian_subkegiatan}', [KartuKendaliController::class, 'show'] )->name('kartuKendali.show');

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
