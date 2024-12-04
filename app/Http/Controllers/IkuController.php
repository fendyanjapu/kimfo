<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Iku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($i='')
    {
        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        $dokumen = "IKU Esselon ${i}";
        $iku = Iku::where('jenis_dokumen', '=', $dokumen)->get();

        return view('pages.admin.iku.index', [
            'query' => $iku,
            'judul' => $dokumen,
            'i' => $i
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('dokumen')->getSize() <= 4000000) {
            $dokumen =$request->file('dokumen');
            $tujuan_upload = 'upload';
            $nama = str_replace(' ', '', $dokumen->getClientOriginalName());
            $nama_dokumen = $request->id_sopd."_".time()."_".$nama;
            $dokumen->move($tujuan_upload,$nama_dokumen);
            
             Iku::create([
                'dokumen' => $nama_dokumen,
                'nama_dokumen' => $request->nama_dokumen,
                'id_sopd' => $request->id_sopd,
                'jenis_dokumen' => $request->jenis_dokumen,
            ]);
            Alert::success('Hore!', 'Data berhasil disimpan');
            return redirect()->route('iku.index', ['i' => $request->i]);
        } else {
            echo "<script>
                alert('Ukuran file maksimal 4 MB');
                self.history.back();
                </script>";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Iku $iku)
    {
        $query = Iku::findOrFail($iku->id);

        return view('pages.admin.iku.show', ['query' => $query]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iku $iku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iku $iku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iku $iku)
    {
        $query = Iku::where('id', '=', $iku->id)->first();
        $dokumen = $query->dokumen;
        $i = substr($query->jenis_dokumen, -1);
        File::delete('upload/'.$dokumen);

        if ($iku) {
            $iku->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('iku.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();

    }

    public function download(Iku $iku)
    {
        $query = Iku::where('id', '=', $iku->id)->first();
        $dokumen = $query->dokumen;
        return response()->download(public_path('upload/'.$dokumen));
    }
}
