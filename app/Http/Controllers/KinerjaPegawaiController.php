<?php

namespace App\Http\Controllers;

use App\Models\Kinerja_pegawai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Session;
use Alert;

class KinerjaPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesi = Session::get('level');

        if ($sesi == 'Admin') {
            $kinerjaPegawai = Kinerja_pegawai::all();
        } else if ($sesi == 'Pegawai') {
            $kinerjaPegawai = Kinerja_pegawai::where('pegawai_id', '=', Session::get('id_user'))->get();
        }
        
        return view('pages.admin.kinerja_pegawai.index', ['query' => $kinerjaPegawai]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sesi = Session::get('level');

        if ($sesi == 'Admin') {
            $pegawai = Pegawai::all();
        } else if ($sesi == 'Pegawai') {
            $pegawai = Pegawai::where('id', '=', Session::get('id_user'))->get();
        }

        return view('pages.admin.kinerja_pegawai.create', ['pegawai' => $pegawai]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['tgl_input'] = date('Y-m-d');
        Kinerja_pegawai::create($data);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('kinerja_pegawai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kinerja_pegawai $kinerja_pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kinerja_pegawai $kinerja_pegawai)
    {
        $sesi = Session::get('level');

        if ($sesi == 'Admin') {
            $pegawai = Pegawai::all();
        } else if ($sesi == 'Pegawai') {
            $pegawai = Pegawai::where('id', '=', Session::get('id_user'))->get();
        }

        $kinerja_pegawais = Kinerja_pegawai::findOrFail($kinerja_pegawai->id);

        return view('pages.admin.kinerja_pegawai.edit', [
            'kinerja_pegawai' => $kinerja_pegawais,
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kinerja_pegawai $kinerja_pegawai)
    {
        $update = $kinerja_pegawai->update([
            "pegawai_id" =>  $request['pegawai_id'],
            "kinerja_harian" =>$request['kinerja_harian'],
            "target_bulanan" =>$request['target_bulanan'],
            "iku_bidang" =>$request['iku_bidang'],
            "tgl_input" => date('Y-m-d')
        ]);
        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('kinerja_pegawai.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kinerja_pegawai $kinerja_pegawai)
    {
        $delete = Kinerja_pegawai::destroy($kinerja_pegawai->id);

        if($delete){
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('kinerja_pegawai.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
