<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Sasaran;
use Illuminate\Http\Request;

class SasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sasarans = Sasaran::all();
        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        return view('pages.admin.sasaran.index', ['sasarans' => $sasarans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.sasaran.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
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
        $query = Sasaran::findOrFail($sasaran->id);

        return view('pages.admin.sasaran.edit', [
            'sasaran' => $query,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sasaran $sasaran)
    {
        $update = $sasaran->update([
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
        if ($sasaran) {
            $sasaran->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('sasaran.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}
