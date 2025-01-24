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
        return redirect()->route('arips.index', ['jenis_arsip_id' => $request->jenis_arsip_id]);
    }
}
