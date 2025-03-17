<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;

class DataPresensiController extends Controller
{
    public function index(Request $request)
    {

        $bulan = $request->bulan;
        $pegawai_id = $request->pegawai;
        $presensis = Presensi::whereMonth('tanggal', '=', $bulan)
                                ->where('user_id', '=', $pegawai_id)
                                ->orderBy('tanggal')->get();

        $pegawais = User::where('jabatan_id', '!=', '1')->orderBy('nama')->get();

        return view('pages.admin.dataPresensi.index', compact(
            'presensis', 
            'pegawais',
            'bulan',
            'pegawai_id',
        ));
    }
}
