<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);

       $jabatans = Jabatan::all();
       return view('pages.admin.jabatan.index', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.jabatan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_jabatan' => 'required|string',
        ]);

        $create = Jabatan::create([
            'nama_jabatan' => $validasi['nama_jabatan'],
        ]);

        if($create){
            Alert::success('Sukses', 'Jabatan Berhasil Ditambahkan');
            return redirect()->route('jabatan.index');
        }
        else{
            Alert::error('Gagal', 'Jabatan Gagal Ditambahkan');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        $query = Jabatan::findOrFail($jabatan->id);
        return view('pages.admin.jabatan.edit', ['jabatan' => $query]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $query = Jabatan::findorfail($jabatan->id);

        $validasi = $request->validate([
            'nama_jabatan' => 'required|string',
        ]);

        $Updatedata = $query->update([
            'nama_jabatan' => $validasi['nama_jabatan'],
        ]);


        if($Updatedata == true){
            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect()->route('jabatan.index');
        }
        else{
            Alert::error('Gagal', 'Data Gagal Diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        if ($jabatan) {
            $jabatan->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('jabatan.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}
