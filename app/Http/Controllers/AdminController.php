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
use App\Models\PersentaseCapaian;
use Illuminate\Support\Facades\DB;

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
        $gambar_masuk = [];
        $gambar_pulang = [];
        $dinas_luar = [];

        if ($pegawai_id != null) {
            for ($i = 1; $i <= $jumlahHari; $i++) {
                $num_padded = sprintf("%02d", $i);
                $tgl = $tahun."-".$bulan."-".$num_padded;
                $presensi = Presensi::where('tanggal', '=', $tgl)->where('user_id', '=', $pegawai_id)->first();
                if ($presensi != null) {
                    $jam_masuk[$i] = $presensi->jam_masuk;
                    $jam_pulang[$i] = $presensi->jam_pulang;
                    $gambar_masuk[$i] = $presensi->gambar_masuk;
                    $gambar_pulang[$i] = $presensi->gambar_pulang;
                    $dinas_luar[$i] = $presensi->dinas_luar;
                }  else {
                    $jam_masuk[$i] = '';
                    $jam_pulang[$i] = '';
                    $gambar_masuk[$i] = '';
                    $gambar_pulang[$i] = '';
                    $dinas_luar[$i] = '';
                }
            }
        }

        $hariLibur = HariLibur::whereMonth('tanggal_libur', '=', $bulan)->get();

        if (auth()->user()->id < 6) {
            $pegawais = User::where('jabatan_id', '!=', '1')
                            ->where('atasan', '=', auth()->user()->id)
                            ->orderBy('nama')->get();
        } else {
            $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();
        }
        
        return view('pages.admin.data.presensi', compact(
            'pegawai_id', 
            'pegawais',
            'jumlahHari', 
            'month', 
            'bulan', 
            'jam_masuk', 
            'jam_pulang',
            'gambar_masuk', 
            'gambar_pulang',
            'dinas_luar',
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

    private function bulan($bulan)
    {
        switch ($bulan) {
            case '01':
                $month = 'jan';
              break;
            case '02':
                $month = 'feb';
              break;
            case '03':
                $month = 'mar';
              break;
            case '04':
                $month = 'apr';
              break;
            case '05':
                $month = 'mei';
              break;
            case '06':
                $month = 'jun';
              break;
            case '07':
                $month = 'jul';
              break;
            case '08':
                $month = 'agu';
              break;
            case '09':
                $month = 'sep';
              break;
            case '10':
                $month = 'okt';
              break;
            case '11':
                $month = 'nov';
              break;
            case '12':
                $month = 'des';
              break;
            default:
            $month = '';
          }
        return $month;
    }

    public function capaianKinerja(Request $request)
    {
        $pegawai_id = $request->pegawai;
        $bulan = $request->bulan;
        if ($bulan == null) {
            $bulan = date('m');
        }
        
        $month = $this->bulan($bulan);
        $capaianKinerjas = CapaianKinerja::where('user_id', '=', $pegawai_id)
                                        ->where('bulan', $month)->get();
        
        $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();

        return view('pages.admin.data.capaianKinerja', compact(
            'pegawai_id',
            'bulan',
            'pegawais',
            'capaianKinerjas',
        ));
    }

    public function evaluasi(Request $request)
    {
        $bulan = $request->bulan;
        if ($bulan == null) {
            $bulan = date('m');
        }
        $month = $this->bulan($bulan);
        
        $users = User::where('id', '>', '5')->get();
        foreach ($users as $user) {
            $i = 0;
            $jumlah = 0;
            $targetBulanans = TargetBulanan::where('user_id', '=', $user->id)->get();
            foreach ($targetBulanans as $targetBulanan) {
                
                if ($targetBulanan->$month != 0) {
                    $target = $targetBulanan->$month;
                    $capaianKinerja = CapaianKinerja::where('user_id', '=', $user->id)
                                                    ->where('indikator_id', '=', $targetBulanan->indikator_id)
                                                    ->where('verifikasi', '!=', null)
                                                    ->where('bulan', '=', $month)->first();

                    $capaian = $capaianKinerja->jumlah ?? '0';
                    $persentaseIndikator[++$i] = ($capaian / $target) * 100;
                    if ($persentaseIndikator[$i] > 100) {
                        $persentaseIndikator[$i] = 100;
                    }
                    $jumlah += $persentaseIndikator[$i];
                }
            }
            if ($i == 0) {
                $totalPersentase = 0;
            } else {
                $totalPersentase = $jumlah / $i;
            }
            $persentaseCapaian = PersentaseCapaian::where('user_id', '=', $user->id)
                                                ->where('tahun', '=', date('Y'))
                                                ->where('bulan', '=', $bulan);
            if ($persentaseCapaian->count() > 0) {
                $data = [
                    'persentase' => number_format($totalPersentase, 2)
                ];
                $persentaseCapaian->update($data);
            } else {
                $data = [
                    'user_id' => $user->id,
                    'tahun' => date('Y'),
                    'bulan' => $bulan,
                    'persentase' => number_format($totalPersentase, 2)
                ];
                PersentaseCapaian::create($data);
            }
        }
        $persentaseCapaians = PersentaseCapaian::where('bulan', '=', $bulan)->orderBy('persentase', 'desc')->get();
        return view('pages.admin.data.evaluasi', compact('bulan', 'persentaseCapaians'));
    }

    public function evaluasiDetail($bulan, $id)
    {
        $nama = User::findOrFail($id)->nama;
        $month = $this->bulan($bulan);
        
        $query = Indikator::where('user_id', '=', $id)->get();
        // $target = [];
        foreach ($query as $key) {
            $targets = TargetBulanan::where('indikator_id', '=', $key->id)->first();
            $target[$key->id] = $targets->$month;
            $capaians = CapaianKinerja::where('indikator_id', '=', $key->id)
                                    ->where('bulan', '=', $month)
                                    ->where('verifikasi', '!=', null);
            if ($capaians->count() > 0) {
                $capaian[$key->id] = $capaians->first()->jumlah;
            } else {
                $capaian[$key->id] = 0;
            }
        }
        
        return view('pages.admin.data.evaluasiDetail', compact('nama', 'query', 'target', 'capaian'));
    }
}
