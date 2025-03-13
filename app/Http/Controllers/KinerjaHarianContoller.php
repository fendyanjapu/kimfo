<?php

namespace App\Http\Controllers;

use PDF;
use Alert;
use App\Models\Sasaran;
use App\Models\Presensi;
use App\Models\Indikator;
use App\Models\SasaranUtama;
use Illuminate\Http\Request;
use App\Models\Kinerja_pegawai;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class KinerjaHarianContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);

        $kinerjaPegawai = Kinerja_pegawai::where('user_id', '=', auth()->user()->id)->orderBy('tgl_input', 'desc')->get();
        $cekPresensi = Presensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', date('Y-m-d'))->count();
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
        $sasaran = Sasaran::where('user_id', '=', auth()->user()->id)->get();
        return view('pages.pegawai.kinerja_harian.create', [
            'sasarans' => $sasaran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'sasaran_id' => 'required',
            'kinerja_harian' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'bukti_kegiatan' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip|max:2048',
            'tgl_input' => 'required|date',
            'jam_awal' => 'required',
            'jam_akhir' => 'required',
        ];

        $gambar =$request->file('bukti_kegiatan');
        $tujuan_upload = 'upload/bukti_kegiatan';
        $nama_gbr = time()."_".$gambar->getClientOriginalName(); 
        

        $data = $request->validate($rules);
        $data['user_id'] = auth()->user()->id;
        $data['indikator_id'] = $request->indikator_id;
        $data['bukti_kegiatan'] = $nama_gbr;
        $store = Kinerja_pegawai::create($data);

        if ($store) {
            $gambar->move($tujuan_upload,$nama_gbr);
        }

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
        $this->authorize('update', $kinerja_harian);

        $sasaran = Sasaran::where('user_id', '=', auth()->user()->id)->get();
        $indikator = Indikator::where('user_id', '=', auth()->user()->id)->get();
        $kinerja_pegawais = Kinerja_pegawai::findOrFail($kinerja_harian->id);

        return view('pages.pegawai.kinerja_harian.edit', [
            'kinerja_pegawai' => $kinerja_pegawais,
            'indikators' => $indikator,
            'sasarans' => $sasaran,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kinerja_pegawai $kinerja_harian)
    {
        $update = $kinerja_harian->update([
            "kinerja_harian" => $request['kinerja_harian'],
            "sasaran_utama_id" => $request['sasaran_utama_id'],
            "sasaran_id" => $request['sasaran_id'],
            "indikator_id" => $request['indikator_id'],
            "jumlah" => $request['jumlah'],
            "satuan" => $request['satuan'],
            "tgl_input" => $request['tgl_input'],
            "jam_awal" => $request['jam_awal'],
            "jam_akhir" => $request['jam_akhir'],
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
        $file = Kinerja_pegawai::findOrFail($kinerja_harian->id)->first()->bukti_kegiatan;

        if ($kinerja_harian) {
            $kinerja_harian->delete();

            $file_path = public_path('upload/bukti_kegiatan/'.$file );
            if (File::exists($file_path)) {
                File::delete($file_path);
                echo 'File deleted successfully.';
            } else {
                echo 'File does not exist.';
            }

            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('kinerja_harian.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }

    public function getIndikator($sasaran_id)
    {
        $indikator = Indikator::where('sasaran_id', '=', $sasaran_id)->get();
        return response()->json($indikator);
    }
}
