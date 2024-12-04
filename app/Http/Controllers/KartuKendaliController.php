<?php

namespace App\Http\Controllers;

use App\Models\Penggunaan_kas;
use App\Models\uraian_subkegiatan;
use Illuminate\Http\Request;
use PDF;

class KartuKendaliController extends Controller
{
    public function index()
    {
        $query = uraian_subkegiatan::all();

        return view('pages.admin.kartu_kendali.index', [ 'query' => $query ]);
    }

    public function show($id_uraian_subkegiatan)
    {
        $uraian_subkegiatan = uraian_subkegiatan::findOrFail($id_uraian_subkegiatan);

        $penggunaan_kas_bulan_ini = Penggunaan_kas::
                    where('id_uraian_subkegiatan', '=', $id_uraian_subkegiatan)
                    ->where('bulan', '=', date('n'))->sum('pagu');

        $penggunaan_kas_bulan_lalu = Penggunaan_kas::
                    where('id_uraian_subkegiatan', '=', $id_uraian_subkegiatan)
                    ->where('bulan', '=', date('n')-1)->sum('pagu');

        $penggunaan_kas = Penggunaan_kas::
                    where('id_uraian_subkegiatan', '=', $id_uraian_subkegiatan)->sum('pagu');
 
        $pdf = PDF::loadview('pages.admin.kartu_kendali.show',[
            'uraian_subkegiatan' => $uraian_subkegiatan,
            'penggunaan_kas_bulan_ini' => $penggunaan_kas_bulan_ini,
            'penggunaan_kas_bulan_lalu' => $penggunaan_kas_bulan_lalu,
            'penggunaan_kas' => $penggunaan_kas,
        ]);
        return $pdf->stream();
    }
}
