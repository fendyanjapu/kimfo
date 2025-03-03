<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Indikator;
use Illuminate\Http\Request;
use App\Models\CapaianKinerja;
use Illuminate\Support\Facades\File;

class CapaianKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        $capaianKinerjas = CapaianKinerja::where('user_id', '=', auth()->user()->id)->get();
        return view('pages.pegawai.capaianKinerja.index', compact('capaianKinerjas'));
    }

    public function getSatuan(Request $request)
    {
        $id = $request->id;
        $indikator = Indikator::findOrFail($id);

        return json_encode($indikator);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indikators = Indikator::where('user_id', '=', auth()->user()->id)->get();
        return view('pages.pegawai.capaianKinerja.add', compact('indikators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gambar =$request->file('bukti_capaian');
        $tujuan_upload = 'upload/bukti_capaian';
        $nama_gbr = time()."_".$gambar->getClientOriginalName(); 
        $gambar->move($tujuan_upload,$nama_gbr);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['bukti_capaian'] = $nama_gbr;
        CapaianKinerja::create($data);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('capaianKinerja.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CapaianKinerja $capaianKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CapaianKinerja $capaianKinerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CapaianKinerja $capaianKinerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CapaianKinerja $capaianKinerja)
    {
        $file = CapaianKinerja::findOrFail($capaianKinerja->id)->first()->bukti_capaian;

        if ($capaianKinerja) {
            $capaianKinerja->delete();

            $file_path = public_path('upload/bukti_capaian/'.$file );
            if (File::exists($file_path)) {
                File::delete($file_path);
                echo 'File deleted successfully.';
            } else {
                echo 'File does not exist.';
            }

            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('capaianKinerja.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}
