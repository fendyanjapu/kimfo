<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use PDF;
use Alert;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\Kinerja_pegawai;
use Illuminate\Support\Facades\Session;

class KinerjaHarianContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kinerjaPegawai = Kinerja_pegawai::where('user_id', '=', Session::get('id_user'))->orderBy('tgl_input', 'desc')->get();
        $cekPresensi = Presensi::where('user_id', '=', Session::get('id_user'))->where('tanggal', '=', date('Y-m-d'))->count();
        if ($cekPresensi == 0) {
            return redirect()->route('presensi.index');
        }

        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        return view('pages.pegawai.kinerja_harian.index', ['query' => $kinerjaPegawai]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indikator = Indikator::where('user_id', '=', Session::get('atasan'))->get();
        return view('pages.pegawai.kinerja_harian.create', [
            'indikators' => $indikator,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gambar =$request->file('bukti_kegiatan');
        $tujuan_upload = 'upload/bukti_kegiatan';
        $nama_gbr = time()."_".$gambar->getClientOriginalName(); 
        $gambar->move($tujuan_upload,$nama_gbr);

        $data = $request->all();
        $data['user_id'] = Session::get('id_user');
        $data['bukti_kegiatan'] = $nama_gbr;
        Kinerja_pegawai::create($data);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('kinerja_harian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kinerja_pegawai $kinerja_harian)
    {
        $kinerja_harians = Kinerja_pegawai::findOrFail($kinerja_harian->id);
 
        $pdf = PDF::loadview('pages.pegawai.kinerja_harian.show',['kinerja_pegawai'=>$kinerja_harians]);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kinerja_pegawai $kinerja_harian)
    {
        $indikator = Indikator::where('user_id', '=', Session::get('atasan'))->get();
        $kinerja_pegawais = Kinerja_pegawai::findOrFail($kinerja_harian->id);

        return view('pages.pegawai.kinerja_harian.edit', [
            'kinerja_pegawai' => $kinerja_pegawais,
            'indikators' => $indikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kinerja_pegawai $kinerja_harian)
    {
        $update = $kinerja_harian->update([
            "kinerja_harian" => $request['kinerja_harian'],
            "indikator_id" => $request['indikator_id'],
            "tgl_input" => $request['tgl_input']
        ]);
        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('kinerja_harian.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kinerja_pegawai $kinerja_harian)
    {
        if ($kinerja_harian) {
            $kinerja_harian->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('kinerja_harian.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}