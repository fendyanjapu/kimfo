<?php

namespace App\Http\Controllers;

use App\Models\rfk_kegiatan;
use App\Models\rfk_program;
use Illuminate\Http\Request;

use Alert;

class RfkKegiatanController extends Controller
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

        $data = rfk_kegiatan::with('program')
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('pages.admin.kegiatan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = rfk_program::all();
        return view('pages.admin.kegiatan.add_kegiatan', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = rfk_kegiatan::create([
            "id_sopd" => '18',
            "id_program" =>  $request['id_program'],
            "kegiatan_kode" =>$request['kegiatan_kode'],
            "kegiatan_sasaran" =>$request['kegiatan_sasaran'],
            "kegiatan" =>$request['kegiatan'],
            "kegiatan_indikator_kinerja" =>  $request['kegiatan_indikator_kinerja'],
            "kode_rekening" =>  $request['kode_rekening'],
            "pagu_kegiatan" =>  $request['pagu_kegiatan'],
        ]);

        if($create == true){
            Alert::success('Sukses', 'Data Berhasil Ditambahkan');
            return redirect()->route('rfk_kegiatan.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal Ditambahkan');
            return redirect()->back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rfk_kegiatan $rfk_kegiatan)
    {
        $rfk_kegiatan = $rfk_kegiatan->load('program');
        $program = rfk_program::all();
        return view('pages.admin.kegiatan.edit_kegiatan', compact('rfk_kegiatan','program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rfk_kegiatan $rfk_kegiatan)
    {
        $update = $rfk_kegiatan->update([
            "id_sopd" => '18',
            "id_program" =>  $request['id_program'],
            "kegiatan_kode" =>$request['kegiatan_kode'],
            "kegiatan_sasaran" =>$request['kegiatan_sasaran'],
            "kegiatan" =>$request['kegiatan'],
            "kegiatan_indikator_kinerja" =>  $request['kegiatan_indikator_kinerja'],
            "kode_rekening" =>  $request['kode_rekening'],
            "pagu_kegiatan" =>  $request['pagu_kegiatan'],
        ]);
        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('rfk_kegiatan.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rfk_kegiatan $rfk_kegiatan)
    {
        $hapusKegiatan = $rfk_kegiatan->delete();
        if($hapusKegiatan == true){
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('rfk_kegiatan.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal Dihapus');
            return redirect()->back();
        }
    }


}
