<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\TargetBulanan;
use Illuminate\Http\Request;
use App\Models\CapaianKinerja;

class EvaluasiController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan;
        if ($bulan == null) {
            $bulan = date('m');
        }

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

        $capaianKinerjas = CapaianKinerja::where('bulan', '=', $month)->get();

        $target = [];
        foreach ($capaianKinerjas as $key) {
          if ($key->user?->atasan == auth()->user()->id) {
            $targets = TargetBulanan::where('indikator_id', '=', $key->indikator_id)->first();
            $target[$key->indikator_id] = $targets->$month;
          }
        }
        return view('pages.pegawai.evaluasi.index', compact('capaianKinerjas', 'bulan', 'target'));
    }

    public function verifikasi(Request $request)
    {
      $id = $request->id;
      $capaianKinerja = CapaianKinerja::findOrFail($id);
      $data['verifikasi'] = '1';
      $capaianKinerja->update($data);
    }
}
