<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\SasaranUtama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SasaranUtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sasarans = SasaranUtama::where('user_id', '=', auth()->user()->id)->get();
        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        return view('pages.pegawai.sasaran-utama.index', ['sasarans' => $sasarans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pegawai.sasaran-utama.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        SasaranUtama::create($data);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('sasaran-utama.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SasaranUtama $sasaranUtama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SasaranUtama $sasaranUtama)
    {
        $this->authorize('update', $sasaranUtama);

        return view('pages.pegawai.sasaran-utama.edit', [
            'sasaranUtama' => $sasaranUtama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SasaranUtama $sasaranUtama)
    {
        $this->authorize('update', $sasaranUtama);

        $update = $sasaranUtama->update([
            "sasaran_strategis" => $request['sasaran_strategis'],
            "indikator_kinerja" => $request['indikator_kinerja'],
            "target" => $request['target'],
            "satuan" => $request['satuan'],
        ]);
        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('sasaran-utama.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SasaranUtama $sasaranUtama)
    {
        $this->authorize('delete', $sasaranUtama);

        if ($sasaranUtama) {
            $sasaranUtama->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('sasaran-utama.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}
