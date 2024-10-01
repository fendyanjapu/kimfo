<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rfk_program;

use Alert;
class RfkProgramController extends Controller
{
    public function index(){

        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        $data = rfk_program::all()->sortByDesc('created_at');

        return view('pages.admin.program.index',compact('data'));
    }

    public function create(){
        return view('pages.admin.program.add_program');
    }
    public function store(Request $request){

        $create = rfk_program::create([
            "id_sopd" => '18',
            "kode_a" => $request['kode_a'],
            "kode_b" => $request['kode_b'],
            "program_kode" => $request['program_kode'],
            "sasaran" =>$request['sasaran'],
            "program" =>  $request['program'],
            "indikator_kinerja" =>  $request['indikator_kinerja'],
            "kode_rekening" =>  $request['kode_rekening'],
            "pagu_program" =>  $request['pagu_program'],
        ]);

        if($create == true){
            Alert::success('Sukses', 'Data Berhasil Ditambahkan');
            return redirect()->route('rfk_program.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal Ditambahkan');
            return redirect()->back();
        }

    }

    public function edit($id){

        $dProgram = rfk_program::findorfail($id);
        return view('pages.admin.program.edit_program', compact('dProgram'));

    }

    public function update(Request $request, $id){
        $uProgram = rfk_program::Findorfail($id);

        $update = $uProgram->update([
            "id_sopd" => '18',
            "kode_a" => $request['kode_a'],
            "kode_b" => $request['kode_b'],
            "program_kode" => $request['program_kode'],
            "sasaran" =>$request['sasaran'],
            "program" =>  $request['program'],
            "indikator_kinerja" =>  $request['indikator_kinerja'],
            "kode_rekening" =>  $request['kode_rekening'],
            "pagu_program" =>  $request['pagu_program'],
        ]);

        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('rfk_program.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    public function destroy($id){
        $hProgram = rfk_program::findorfail($id);
        $hProgram->delete();

        if($hProgram == true){
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('rfk_program.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal Dihapus');
            return redirect()->back();
        }

    }
}
