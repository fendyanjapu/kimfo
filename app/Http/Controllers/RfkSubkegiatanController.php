<?php

namespace App\Http\Controllers;

use App\Models\rfk_subkegiatan;
use App\Models\rfk_program;
use App\Models\rfk_kegiatan;
use Illuminate\Http\Request;

use Alert;
class RfkSubkegiatanController extends Controller
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
    $rfk_subkegiatan = rfk_subkegiatan::with('kegiatan.program')
        ->OrderBy('created_at', 'DESC')
        ->get();
        return view('pages.admin.subkegiatan.index', compact('rfk_subkegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        $program = rfk_program::all();
        return view('pages.admin.subkegiatan.add_subkegiatan',compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = rfk_subkegiatan::create([
            "id_sopd" => '18',
            "id_kegiatan" => $request['id_kegiatan'],
            "subkegiatan_kode" =>$request['subkegiatan_kode'],
            "subkegiatan_sasaran" =>$request['subkegiatan_sasaran'],
            "subkegiatan" =>$request['subkegiatan'],
            "subkegiatan_indikator_kinerja" =>  $request['subkegiatan_indikator_kinerja'],
            "kode_rekening" =>  $request['kode_rekening'],
            "pagu_subkegiatan" =>  $request['pagu_subkegiatan'],
        ]);

        if($create == true){
            Alert::success('Sukses', 'Data Berhasil ditambah');
            return redirect()->route('rfk_subkegiatan.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal ditambah');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rfk_subkegiatan $rfk_subkegiatan)
    {
        if ($rfk_subkegiatan) {
            $subkegiatan = $rfk_subkegiatan->load('kegiatan.program');

            $kegiatan = rfk_kegiatan::all();
            $program = rfk_program::all();


            return view('pages.admin.subkegiatan.edit_subkegiatan', compact('subkegiatan','program','kegiatan'));
        }

        Alert::error('Error!', 'Data Tidak Ada');
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rfk_subkegiatan $rfk_subkegiatan)
    {
        $update = $rfk_subkegiatan->update([
            "id_sopd" => '18',
            "id_kegiatan" => $request['id_kegiatan'],
            "subkegiatan_kode" =>$request['subkegiatan_kode'],
            "subkegiatan_sasaran" =>$request['subkegiatan_sasaran'],
            "subkegiatan" =>$request['subkegiatan'],
            "subkegiatan_indikator_kinerja" =>  $request['subkegiatan_indikator_kinerja'],
            "kode_rekening" =>  $request['kode_rekening'],
            "pagu_subkegiatan" =>  $request['pagu_subkegiatan'],
        ]);

        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('rfk_subkegiatan.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rfk_subkegiatan $rfk_subkegiatan)
    {
        if ($rfk_subkegiatan) {
            $rfk_subkegiatan->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('rfk_subkegiatan.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();

    }
}
