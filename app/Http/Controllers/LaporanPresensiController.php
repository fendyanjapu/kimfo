<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class LaporanPresensiController extends Controller
{
    public function tes(Request $request)
    {
        $bulan = $request->bulan;
        $year = date('y');
        $tahun = date('Y');
        $month = date_format(date_create('01-'.$bulan.'-'.$tahun), 'M');
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        echo $jumlahHari."<br>";
        for ($i = 1; $i <= $jumlahHari; $i++) {
            $num_padded = sprintf("%02d", $i);
            $tgl = $tahun."-".$bulan."-".$num_padded;
            $hari = date_format(date_create($tgl), 'l');
            if ($hari == 'Saturday' || $hari == 'Sunday') {
                $libur = 'Libur';
            } else {
                $libur = '';
            }
            echo $i.'-'.$month.'-'.$year.' '.$libur.'<br>';
        }
    }

    public function index()
    {
        return view('pages.pegawai.laporan.presensi');
    }

    public function print(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = date('Y');
        $month = date_format(date_create('01-'.$bulan.'-'.$tahun), 'M');
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $jam_masuk = [];
        $jam_pulang = [];

        for ($i = 1; $i <= $jumlahHari; $i++) {
            $num_padded = sprintf("%02d", $i);
            $tgl = $tahun."-".$bulan."-".$num_padded;
            $presensi = Presensi::where('tanggal', '=', $tgl)->where('user_id', '=', auth()->user()->id)->first();
            if ($presensi != null) {
                $jam_masuk[$i] = $presensi->jam_masuk;
                $jam_pulang[$i] = $presensi->jam_pulang;
            }  else {
                $jam_masuk[$i] = '';
                $jam_pulang[$i] = '';
            }
        }

        $atasan = User::where('id', '=', auth()->user()->atasan)->first();
        $nama_atasan = $atasan->nama;
        $nip_atasan = $atasan->nip;
        $jabatan_atasan = $atasan->jabatan->nama_jabatan;

        $pdf = PDF::loadview('pages.pegawai.laporan.presensiPrint', compact(
            'jumlahHari', 
            'month', 
            'bulan', 
            'jam_masuk', 
            'jam_pulang',
            'nama_atasan',
            'nip_atasan',
            'jabatan_atasan',
        ));
    	return $pdf->stream('laporan-presensi-pdf');
    }
}
