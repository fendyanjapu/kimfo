<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rfk_program;

use Alert;
class RfkProgramController extends Controller
{
    public function index(){

        $data = rfk_program::all();

        return view('pages.admin.program.index',compact('data'));
    }

    public function create(){
        return view('pages.admin.program.add_program');
    }
    public function store(Request $request){

        $validasi = $request->validate([
            "kode_a" => 'required|integer',
            "kode_b" => 'required|integer',
            "program_kode" => 'required|integer',
            "sasaran" => 'required|string',
            "program" =>  'required|string',
            "indikator_kinerja" =>  'required|string',
            "kode_rekening" =>  'required|integer',
            "pagu_program" =>  'required|integer',
        ]);

        $create = rfk_program::create([
            "id_sopd" => '18',
            "kode_a" => $validasi['kode_a'],
            "kode_b" => $validasi['kode_b'],
            "program_kode" => $validasi['program_kode'],
            "sasaran" =>$validasi['sasaran'],
            "program" =>  $validasi['program'],
            "indikator_kinerja" =>  $validasi['indikator_kinerja'],
            "kode_rekening" =>  $validasi['kode_rekening'],
            "pagu_program" =>  $validasi['pagu_program'],
        ]);

        if($create == true){
            Alert::success('Suksus', 'Data Berhasil Ditambahkan');
            return redirect()->route('rfk_program.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal Ditambahkan');
            return redirect()->back();
        }

    }
    public function show(Request $request){

    }
    public function destroy(Request $request){
        dd($request);
    }
}
