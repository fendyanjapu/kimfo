<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

use Alert;
class PegawaiController extends Controller
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

        $pegawai = Pegawai::all();
        return view('pages.admin.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.pegawai.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nip' => 'required|max:30',
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'username' => 'required',
            'password' => 'required'
        ],

    );

        $cekPegawai = pegawai::where('nip', $request->nip)->count();

        if($cekPegawai >= 1){
            Alert::error('Gagal', 'NIP Pegawai Sudah Ada');
            return redirect()->back();
        }
        else{
                $createPegawai = Pegawai::create([
                    'nip' => $validasi['nip'],
                    'nama' => $validasi['nama'],
                    'username' => $validasi['username'],
                    'jabatan' => $validasi['jabatan'],
                    'tgl_login' => Null
                ]);

                $createUser = User::create([
                    'username' => $validasi['username'],
                    'password' => sha1($validasi['password']),
                    'level' => 'pegawai'
                ]);

                if($createPegawai == true && $createUser == true){
                    Alert::success('Sukses', 'Pegawai Berhasil Ditambahkan');
                    return redirect()->route('pegawai.index');
                }
                else{
                    Alert::error('Gagal', 'Pegawai Gagal Ditambahkan');
                    return redirect()->back();
                }
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        if($pegawai){
            return view('pages.admin.pegawai.lihat', compact('pegawai'));
        }
        else{
            alert::error('error', 'Tidak Boleh!');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
