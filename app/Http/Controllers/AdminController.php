<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sasaran;
use App\Models\Presensi;
use App\Models\HariLibur;
use App\Models\Indikator;
use Illuminate\Http\Request;
use App\Models\TargetBulanan;
use App\Models\CapaianKinerja;
use App\Models\Kinerja_pegawai;

class AdminController extends Controller
{
    public function presensi(Request $request)
    {
        $pegawai_id = $request->pegawai;
        $bulan = $request->bulan;
        if ($bulan == null) {
            $bulan = date('m');
        }
        $tahun = date('Y');
        $month = date_format(date_create('01-'.$bulan.'-'.$tahun), 'M');
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $jam_masuk = [];
        $jam_pulang = [];

        if ($pegawai_id != null) {
            for ($i = 1; $i <= $jumlahHari; $i++) {
                $num_padded = sprintf("%02d", $i);
                $tgl = $tahun."-".$bulan."-".$num_padded;
                $presensi = Presensi::where('tanggal', '=', $tgl)->where('user_id', '=', $pegawai_id)->first();
                if ($presensi != null) {
                    $jam_masuk[$i] = $presensi->jam_masuk;
                    $jam_pulang[$i] = $presensi->jam_pulang;
                }  else {
                    $jam_masuk[$i] = '';
                    $jam_pulang[$i] = '';
                }
            }
        }

        $hariLibur = HariLibur::whereMonth('tanggal_libur', '=', $bulan)->get();

        $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();

        return view('pages.admin.data.presensi', compact(
            'pegawai_id', 
            'pegawais',
            'jumlahHari', 
            'month', 
            'bulan', 
            'jam_masuk', 
            'jam_pulang',
            'hariLibur'
        ));
    }

    public function sasaran(Request $request)
    {
        $pegawai_id = $request->pegawai;

        $sasarans = Sasaran::where('user_id', '=', $pegawai_id)->get();

        $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();

        return view('pages.admin.data.sasaran', compact(
            'pegawai_id',
            'pegawais',
            'sasarans',
        ));
    }

    public function indikator(Request $request)
    {
        $pegawai_id = $request->pegawai;

        $indikators = Indikator::where('user_id', '=', $pegawai_id)->get();

        $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();

        return view('pages.admin.data.indikator', compact(
            'pegawai_id',
            'pegawais',
            'indikators',
        ));
    }

    public function targetBulanan(Request $request)
    {
        $pegawai_id = $request->pegawai;

        $targetBulanans = TargetBulanan::where('user_id', '=', $pegawai_id)->get();

        $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();

        return view('pages.admin.data.targetBulanan', compact(
            'pegawai_id',
            'pegawais',
            'targetBulanans',
        ));
    }

    public function kinerjaHarian(Request $request)
    {
        $pegawai_id = $request->pegawai;
        $bulan = $request->bulan;
        if ($bulan == null) {
            $bulan = date('m');
        }

        $kinerjaPegawais = Kinerja_pegawai::where('user_id', '=', $pegawai_id)
                                        ->whereMonth('tgl_input', $bulan)
                                        ->orderBy('tgl_input', 'desc')->get();
        
        $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();

        return view('pages.admin.data.kinerjaHarian', compact(
            'pegawai_id',
            'bulan',
            'pegawais',
            'kinerjaPegawais',
        ));
    }

    public function capaianKinerja(Request $request)
    {
        $pegawai_id = $request->pegawai;
        $bulan = $request->bulan;
        if ($bulan == null) {
            $bulan = date('m');
        }

        $capaianKinerjas = CapaianKinerja::where('user_id', '=', $pegawai_id)
                                        ->where('bulan', $bulan)->get();
        
        $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();

        return view('pages.admin.data.capaianKinerja', compact(
            'pegawai_id',
            'bulan',
            'pegawais',
            'capaianKinerjas',
        ));
    }
}
