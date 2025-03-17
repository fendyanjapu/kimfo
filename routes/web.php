<?php

use App\Http\Controllers\CapaianKinerjaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPresensiController;
use App\Http\Controllers\HariLiburController;
use App\Http\Controllers\LaporanBulananController;
use App\Http\Controllers\LaporanPresensiController;
use App\Http\Controllers\TargetBulananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IkuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SasaranController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\RencanaKasController;
use App\Http\Controllers\RfkProgramController;
use App\Http\Controllers\RfkKegiatanController;
use App\Http\Controllers\SelectComboController;
use App\Http\Controllers\KartuKendaliController;
use App\Http\Controllers\KinerjaHarianContoller;
use App\Http\Controllers\PengendalianController;
use App\Http\Controllers\SasaranUtamaController;
use App\Http\Controllers\PenggunaanKasController;
use App\Http\Controllers\KinerjaPegawaiController;
use App\Http\Controllers\PresensiPulangController;
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

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-aksi', [LoginController::class, 'loginAksi'])->name('login-aksi');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboad', [DashboardController::class, 'index'] )->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth']], function() {
    Route::get('/pegawai', [PegawaiController::class, 'index'] )->name('indexPegawai');
    Route::get('/get-indikator/{sasaran_id}', [KinerjaHarianContoller::class, 'getIndikator'] )->name('getIndikator');
    Route::get('/get-satuan', [CapaianKinerjaController::class, 'getSatuan'] )->name('getSatuan');
    Route::get('/get-target', [TargetBulananController::class, 'getTarget'] )->name('getTarget');
    Route::get('/arsip/{jenis_arsip_id}', [ArsipController::class, 'index'] )->name('arsip.index');
    Route::get('/arsip/create/{jenis_arsip_id}', [ArsipController::class, 'create'] )->name('arsip.create');
    Route::get('/arsip/{id}/edit', [ArsipController::class, 'edit'] )->name('arsip.edit');
    Route::get('/laporanPresensi', [LaporanPresensiController::class, 'index'] )->name('laporanPresensi');
    Route::get('/laporanPresensi/print', [LaporanPresensiController::class, 'print'] )->name('laporanPresensi.print');
    Route::get('/laporanBulanan', [LaporanBulananController::class, 'index'] )->name('laporanBulanan');
    Route::get('/laporanBulanan/print', [LaporanBulananController::class, 'print'] )->name('laporanBulanan.print');
    Route::get('/getKinerja', [LaporanBulananController::class, 'getKinerja'] )->name('getKinerja');

    Route::post('/arsip/store', [ArsipController::class, 'store'] )->name('arsip.store');
    Route::put('/arsip/{id}/update', [ArsipController::class, 'update'] )->name('arsip.update');
    Route::delete('/arsip/{id}/delete', [ArsipController::class, 'delete'] )->name('arsip.delete');

    Route::resource('presensi', PresensiController::class);
    Route::resource('presensi-pulang', PresensiPulangController::class);
    Route::resource('kinerja_harian', KinerjaHarianContoller::class);
    Route::resource('sasaran', SasaranController::class)->except('show');
    Route::resource('indikator', IndikatorController::class);
    Route::resource('sasaran-utama', SasaranUtamaController::class)->except('show');
    Route::resource('targetBulanan', TargetBulananController::class)->except('show', 'destroy');
    Route::resource('capaianKinerja', CapaianKinerjaController::class)->except('show', 'edit', 'update');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
   
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
   Route::resource('hariLibur', HariLiburController::class)->except('show');
   

   Route::get('iku/index/{i}', [IkuController::class, 'index'])->name('iku.index');
   Route::get('iku/download/{iku}', [IkuController::class, 'download'])->name('iku.download');

   Route::resource('iku', IkuController::class)->except('index','create','edit', 'update');

   Route::get('pengendalian-program', [PengendalianController::class, 'program'] )->name('pengendalianProgram');
   Route::get('pengendalian-kegiatan', [PengendalianController::class, 'kegiatan'] )->name('pengendalianKegiatan');
   Route::get('pengendalian-subkegiatan', [PengendalianController::class, 'subkegiatan'] )->name('pengendalianSubkegiatan');
   Route::get('pengendalian-uraian-subkegiatan', [PengendalianController::class, 'uraian_subkegiatan'] )->name('pengendalianUraianSubkegiatan');

   Route::get('kartu-kendali', [KartuKendaliController::class, 'index'] )->name('kartuKendali');
   Route::get('kartu-kendali-show/{id_uraian_subkegiatan}', [KartuKendaliController::class, 'show'] )->name('kartuKendali.show');

   Route::get('presensi', [AdminController::class, 'presensi'] )->name('admin.presensi');
   Route::get('sasaran', [AdminController::class, 'sasaran'] )->name('admin.sasaran');
   Route::get('indikator', [AdminController::class, 'indikator'] )->name('admin.indikator');
   Route::get('targetBulanan', [AdminController::class, 'targetBulanan'] )->name('admin.targetBulanan');

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
