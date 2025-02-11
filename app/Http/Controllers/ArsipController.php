<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Arsip;
use App\Models\JenisArsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index($jenis_arsip_id)
    {
        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);

        $jenis_arsip = JenisArsip::findOrFail($jenis_arsip_id);
        $judul = $jenis_arsip->jenis_arsip;

        $arsips = Arsip::where('jenis_arsip_id', '=', $jenis_arsip_id)->get();
        return view('pages.pegawai.arsip.index', [
            'query' => $arsips,
            'judul' => $judul,
            'jenis_arsip_id' => $jenis_arsip_id,
        ]);
    }

    public function create($jenis_arsip_id)
    {
        return view('pages.pegawai.arsip.create', ['jenis_arsip_id' => $jenis_arsip_id]);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $tujuan_upload = 'upload/arsip';
        $nama_file = time()."_".$file->getClientOriginalName(); 
        $file->move($tujuan_upload,$nama_file);

        $data = $request->all();
        $data['file'] = $nama_file;
        Arsip::create($data);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('arsip.index', ['jenis_arsip_id' => $request->jenis_arsip_id]);
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('pages.pegawai.arsip.edit', ['arsip' => $arsip]);
    }

    public function update(Request $request, $id)
    {
        $getid = Arsip::findorfail($id);
        $jenis_arsip_id = $getid->jenis_arsip_id;

        $Updatedata = $getid->update([
            'nama_arsip' => $request->nama_arsip,
            'keterangan' => $request->keterangan,
        ]);


        if($Updatedata == true){
            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect()->route('arsip.index', ['jenis_arsip_id' => $jenis_arsip_id]);
        }
        else{
            Alert::error('Gagal', 'Data Gagal Diubah');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $getid = Arsip::findorfail($id);
        $jenis_arsip_id = $getid->jenis_arsip_id;
        $getid->delete();

        if($getid == true){
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('arsip.index', ['jenis_arsip_id' => $jenis_arsip_id]);
        }
        else{
            Alert::error('Gagal', 'Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
