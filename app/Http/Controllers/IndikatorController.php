<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Sasaran;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indikators = Indikator::where('user_id','=', auth()->user()->id)->get();
        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        return view('pages.pegawai.indikator.index', [
            'indikators' => $indikators,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sasarans = Sasaran::where('user_id', '=', auth()->user()->id)->get();
        return view('pages.pegawai.indikator.add', [
            'sasarans' => $sasarans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        indikator::create($data);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('indikator.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Indikator $indikator)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indikator $indikator)
    {
        $this->authorize('update', $indikator);

        $sasarans = Sasaran::where('user_id', '=', auth()->user()->id)->get();

        return view('pages.pegawai.indikator.edit', [
            'indikator' => $indikator,
            'sasarans' => $sasarans
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indikator $indikator)
    {
        $this->authorize('update', $indikator);

        $update = $indikator->update([
            "sasaran_id" => $request['sasaran_id'],
            "nama_indikator" => $request['nama_indikator'],
            "target" => $request['target'],
            "satuan" => $request['satuan'],
        ]);
        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('indikator.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indikator $indikator)
    {
        $this->authorize('delete', $indikator);

        if ($indikator) {
            $indikator->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('indikator.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}
