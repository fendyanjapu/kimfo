<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Session;
Use Alert;

class LoginController extends Controller
{
    public function index(){
        $users = User::where('jabatan_id', '>', 6)->where('jabatan_id', '!=', null)->get();
        return view('login', compact('users'));
    }

    public function loginAksi(Request $request){
        $cek = array('username'=>$request->input('username'),'password'=>sha1($request->input('password')));

        $cek_hasil = User::where($cek)->count();
        if($cek_hasil == NULL){
            Session::flush();
            Alert::warning('ops!', 'Username Atau Password Anda Salah');
            return redirect()->to('login');
        }else{
            $get_data = User::where($cek)->get();
            if($get_data[0]['level'] == 'Admin'){
                Session::push('cek', 1);
                Session::put('id_user', $get_data[0]['id']);
                Session::put('username', $get_data[0]['username']);
                Session::put('level', $get_data[0]['level']);
                Session::put('nama', $get_data[0]['nama']);
                Alert::toast('Anda berhasil login', 'success')
                ->autoClose(2000)->position('bottom-end');

                return redirect()->to('admin');
            }
            elseif($get_data[0]['level'] == 'pegawai'){
                Session::push('cek', 1);
                Session::put('id_user', $get_data[0]['id']);
                Session::put('username', $get_data[0]['username']);
                Session::put('level', $get_data[0]['level']);
                Session::put('atasan', $get_data[0]['atasan']);
                Session::put('nama', $get_data[0]['nama']);
                Alert::toast('Anda berhasil login', 'success')
                ->autoClose(2000)->position('bottom-end');

                return redirect()->route('indexPegawai');
            }
            else{
                echo "<script>
                Alert::warning('ops!', 'Akun Belum Ada');
				self.history.back();
				</script>";
            }
        }
    }

    public function logout(){
        Session::flush();
            Alert::success('Hore!',"Anda berhasil logout");
            return redirect()->to('login');
    }
}
