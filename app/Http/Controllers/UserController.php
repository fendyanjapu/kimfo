<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

       $user = User::where('level', '!=' , 'Admin')->get();
       return view('pages.admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user.add');
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
        ]);

        $cekPegawai = User::where('nip', $request->nip)->count();

        if($cekPegawai >= 1){
            Alert::error('Gagal', 'NIP Pegawai Sudah Ada');
            return redirect()->back();
        }
        else{
                $createUser = User::create([
                    'nip' => $validasi['nip'],
                    'nama' => $validasi['nama'],
                    'username' => $validasi['username'],
                    'jabatan' => $validasi['jabatan'],
                    'tgl_login' => Null,
                    'password' => sha1($validasi['password']),
                    'level' => 'pegawai'
                ]);

                if($createUser){
                    Alert::success('Sukses', 'Pegawai Berhasil Ditambahkan');
                    return redirect()->route('user.index');
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
    public function show(User $user)
    {
        if($user){
            return view('pages.admin.user.show', compact('user'));
        }
        else{
            alert::error('error', 'Tidak Boleh!');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $query = User::findOrFail($user->id);
        return view('pages.admin.user.edit', ['user' => $query]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validasi = $request->validate([
            'nip' => 'required|max:30',
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'username' => 'required',
        ]);

        if ($request->password != '') {
            $password = sha1($request->password);
        } else {
            $password = $request->password_lama;
        }

        $qUser = User::Findorfail($user->id);

        $updateUser = $qUser->update([
            'nip' => $validasi['nip'],
            'nama' => $validasi['nama'],
            'username' => $validasi['username'],
            'password' => $password,
            'jabatan' => $validasi['jabatan'],
        ]);


        if($updateUser){
            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect()->route('user.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal ditambah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $delete = User::destroy($user->id);

        if($delete){
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('user.index', );
        }
        else{
            Alert::error('Error!', 'Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
