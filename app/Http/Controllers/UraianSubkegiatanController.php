<?php

namespace App\Http\Controllers;

use App\Models\uraian_subkegiatan;
use App\Models\rfk_program;
use App\Models\rfk_kegiatan;
use App\Models\rfk_subkegiatan;
use Illuminate\Http\Request;

use Alert;
class UraianSubkegiatanController extends Controller
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

        $data = uraian_subkegiatan::with('subkegiatan')
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('pages.admin.uraian_subkegiatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = rfk_program::all();
        return view('pages.admin.uraian_subkegiatan.add_usubkegiatan', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = uraian_subkegiatan::create([
            "id_program" => $request['id_program'],
            "id_kegiatan" =>$request['id_kegiatan'],
            "id_subkegiatan" =>$request['id_subkegiatan'],
            "kode_rekening" =>$request['kode_rekening'],
            "uraian" =>  $request['uraian'],
            "pagu" =>  $request['pagu'],
        ]);

        if($create == true){
            Alert::success('Sukses', 'Data Berhasil ditambah');
            return redirect()->route('uraian_subkegiatan.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal ditambah');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(uraian_subkegiatan $uraian_subkegiatan)
    {
        if ($uraian_subkegiatan) {
            $uraian = $uraian_subkegiatan->load('subkegiatan.kegiatan.program');

            $kegiatan = rfk_kegiatan::all();
            $program = rfk_program::all();
            $subkegiatan = rfk_subkegiatan::all();

            return view('pages.admin.uraian_subkegiatan.edit_usubkegiatan', compact('uraian','program','kegiatan','subkegiatan'));
        }

        Alert::error('Error!', 'Data Tidak Ada');
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, uraian_subkegiatan $uraian_subkegiatan)
    {

        $update = $uraian_subkegiatan->update([
            "id_program" => $request['id_program'],
            "id_kegiatan" =>$request['id_kegiatan'],
            "id_subkegiatan" =>$request['id_subkegiatan'],
            "kode_rekening" =>$request['kode_rekening'],
            "uraian" =>  $request['uraian'],
            "pagu" =>  $request['pagu'],
        ]);


        if($update == true){
            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect()->route('uraian_subkegiatan.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal ditambah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(uraian_subkegiatan $uraian_subkegiatan)
    {
        if ($uraian_subkegiatan) {
            $uraian_subkegiatan->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('uraian_subkegiatan.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();

    }
}
