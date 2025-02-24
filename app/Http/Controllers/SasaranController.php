<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Sasaran;
use App\Models\SasaranUtama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sasarans = Sasaran::where('user_id', '=', auth()->user()->id)->get();
        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        return view('pages.pegawai.sasaran.index', ['sasarans' => $sasarans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sasaranUtama = SasaranUtama::where('user_id', '=', auth()->user()->atasan)->get();
        return view('pages.pegawai.sasaran.add', [
            'sasaranUtama' => $sasaranUtama,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Sasaran::create($data);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('sasaran.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sasaran $sasaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sasaran $sasaran)
    {
        $this->authorize('update', $sasaran);

        $sasaranUtama = SasaranUtama::where('user_id', '=', auth()->user()->atasan)->get();

        return view('pages.pegawai.sasaran.edit', [
            'sasaran' => $sasaran,
            'sasaranUtama' => $sasaranUtama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sasaran $sasaran)
    {
        $this->authorize('update', $sasaran);

        $update = $sasaran->update([
            "sasaran_utama_id" => $request['sasaran_utama_id'],
            "nama_sasaran" => $request['nama_sasaran'],
        ]);
        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('sasaran.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sasaran $sasaran)
    {
        $this->authorize('delete', $sasaran);

        if ($sasaran) {
            $sasaran->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('sasaran.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}
