<?php

namespace App\Http\Controllers;

use App\Models\Sasaran;
use PDF;
use App\Models\User;
use App\Models\HariLibur;
use Illuminate\Http\Request;
use App\Models\Kinerja_pegawai;

class LaporanBulananController extends Controller
{
    public function index()
    {
        return view('pages.pegawai.laporan.bulanan');
    }

    public function print(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = date('Y');
        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        $hariLibur = HariLibur::whereMonth('tanggal_libur', '=', $bulan)->get();

        $jml_tgl = [];

        for ($i = 1; $i <= $jumlahHari; $i++) {
            $num_padded = sprintf("%02d", $i);
            $tgl = $tahun."-".$bulan."-".$num_padded;
            $jml_tgl[$i] = Kinerja_pegawai::where('tgl_input', '=', $tgl)->where('user_id', '=', auth()->user()->id)->count();
        }

        $kinerjas = Kinerja_pegawai::where('user_id', '=', auth()->user()->id)
                                    ->whereMonth('tgl_input', '=', $bulan)
                                    ->whereYear('tgl_input', '=', $tahun)
                                    ->orderBy('tgl_input')
                                    ->orderBy('jam_awal')
                                    ->get();

        $sasarans = Sasaran::where('user_id', '=', auth()->user()->id)->get();

        // $fotos = Kinerja_pegawai::whereMonth('tgl_input', '=', $bulan)
        //                         ->whereYear('tgl_input', '=', $tahun)
        //                         ->where('user_id', '=', auth()->user()->id)
        //                         ->inRandomOrder()->limit(4)
        //                         ->get();

        $atasan = User::where('id', '=', auth()->user()->atasan)->first();
        $nama_atasan = $atasan->nama;
        $nip_atasan = $atasan->nip;
        $jabatan_atasan = $atasan->jabatan->nama_jabatan;
        
        $pdf = PDF::loadview('pages.pegawai.laporan.bulananPrint', compact(
            'jumlahHari',
            'hariLibur',
            'bulan', 
            'nama_atasan',
            'nip_atasan',
            'jabatan_atasan',
            'kinerjas',
            'jml_tgl',
            'sasarans',
            // 'fotos',
        ));
    	return $pdf->stream('Laporan-Bulanan-'.$this->bulan($bulan));
    }

    private function bulan($bulan)
    {
        switch ($bulan) {
            case '01':
                $bln = 'JANUARI';
                break;
            case '02':
                $bln = 'FEBRUARI';
                break;
            case '03':
                $bln = 'MARET';
                break;
            case '04':
                $bln = 'APRIL';
                break;
            case '05':
                $bln = 'MEI';
                break;
            case '06':
                $bln = 'JUNI';
                break;
            case '07':
                $bln = 'JULI';
                break;
            case '08':
                $bln = 'AGUSTUS';
                break;
            case '09':
                $bln = 'SEPTEMBER';
                break;
            case '10':
                $bln = 'OKTOBER';
                break;
            case '11':
                $bln = 'NOVEMBER';
                break;
            case '12':
                $bln = 'DESEMBER';
                break;
            default:
                $bln = '';
                break;
        }
        return $bln;
    }
}
