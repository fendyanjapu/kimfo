<?php

namespace App\Http\Controllers;

use App\Models\rencanaKas;
use Illuminate\Http\Request;
use App\Models\uraian_subkegiatan;
use App\Models\rfk_program;
use App\Models\rfk_kegiatan;
use App\Models\rfk_subkegiatan;
use Illuminate\Support\Facades\DB;

use Alert;
class RencanaKasController extends Controller
{
    public function indexProgram(){

        $title = 'program';
        $programs = DB::table('rfk_programs')->get();

        // jumlah pagu
        foreach ($programs as $program) {
            $total_pagu = DB::table('uraian_subkegiatans')
                ->where('id_program', $program->id_program)
                ->sum('pagu');
            $program->jumlah = $total_pagu;
        }

        // jumlah triwulan I
        foreach ($programs as $triI) {
            $IJumlah = DB::table('rencana_kas')
                ->where('id_program', $triI->id_program)
                ->sum('triwulan_i');
            $triI->jumlahI = $IJumlah;
        }

        // jumlah triwulan II
        foreach ($programs as $triII) {
            $IIJumlah = DB::table('rencana_kas')
                ->where('id_program', $triII->id_program)
                ->sum('triwulan_ii');
            $triII->jumlahII = $IIJumlah;
        }

        // jumlah triwulan III
        foreach ($programs as $triIII) {
            $IIIJumlah = DB::table('rencana_kas')
                ->where('id_program', $triIII->id_program)
                ->sum('triwulan_ii');
            $triIII->jumlahIII = $IIIJumlah;
        }

        // jumlah triwulan IV
        foreach ($programs as $triIV) {
            $IVJumlah = DB::table('rencana_kas')
                ->where('id_program', $triIV->id_program)
                ->sum('triwulan_ii');
            $triIV->jumlahIV = $IVJumlah;
        }

        return view('pages.admin.rencana_kas.program.index', compact('title', 'programs'));
    }

    public function indexKegiatan(){

        $title = 'kegiatan';
        $kegiatans = DB::table('rfk_kegiatans')->get();

        // jumlah pagu
        foreach ($kegiatans as $kegiatan) {
            $total_pagu = DB::table('uraian_subkegiatans')
                ->where('id_kegiatan', $kegiatan->id_kegiatan)
                ->sum('pagu');
            $kegiatan->jumlah = $total_pagu;
        }

        // jumlah triwulan I
        foreach ($kegiatans as $triI) {
            $IJumlah = DB::table('rencana_kas')
                ->where('id_kegiatan', $triI->id_kegiatan)
                ->sum('triwulan_i');
            $triI->jumlahI = $IJumlah;
        }

        // jumlah triwulan II
        foreach ($kegiatans as $triII) {
            $IIJumlah = DB::table('rencana_kas')
                ->where('id_kegiatan', $triII->id_kegiatan)
                ->sum('triwulan_ii');
            $triII->jumlahII = $IIJumlah;
        }

        // jumlah triwulan III
        foreach ($kegiatans as $triIII) {
            $IIIJumlah = DB::table('rencana_kas')
                ->where('id_kegiatan', $triIII->id_kegiatan)
                ->sum('triwulan_ii');
            $triIII->jumlahIII = $IIIJumlah;
        }

        // jumlah triwulan IV
        foreach ($kegiatans as $triIV) {
            $IVJumlah = DB::table('rencana_kas')
                ->where('id_kegiatan', $triIV->id_kegiatan)
                ->sum('triwulan_ii');
            $triIV->jumlahIV = $IVJumlah;
        }

        return view('pages.admin.rencana_kas.kegiatan.index', compact('title', 'kegiatans'));
    }

    public function indexSubkegiatan(){

        $title = 'subkegiatan';
        $Subkegiatans = DB::table('rfk_subkegiatans')->get();

        // jumlah pagu
        foreach ($Subkegiatans as $subkegiatan) {
            $total_pagu = DB::table('uraian_subkegiatans')
                ->where('id_subkegiatan', $subkegiatan->id_subkegiatan)
                ->sum('pagu');
            $subkegiatan->jumlah = $total_pagu;
        }

        // jumlah triwulan I
        foreach ($Subkegiatans as $triI) {
            $IJumlah = DB::table('rencana_kas')
                ->where('id_subkegiatan', $triI->id_subkegiatan)
                ->sum('triwulan_i');
            $triI->jumlahI = $IJumlah;
        }

        // jumlah triwulan II
        foreach ($Subkegiatans as $triII) {
            $IIJumlah = DB::table('rencana_kas')
                ->where('id_subkegiatan', $triII->id_subkegiatan)
                ->sum('triwulan_ii');
            $triII->jumlahII = $IIJumlah;
        }

        // jumlah triwulan III
        foreach ($Subkegiatans as $triIII) {
            $IIIJumlah = DB::table('rencana_kas')
                ->where('id_subkegiatan', $triIII->id_subkegiatan)
                ->sum('triwulan_ii');
            $triIII->jumlahIII = $IIIJumlah;
        }

        // jumlah triwulan IV
        foreach ($Subkegiatans as $triIV) {
            $IVJumlah = DB::table('rencana_kas')
                ->where('id_subkegiatan', $triIV->id_subkegiatan)
                ->sum('triwulan_ii');
            $triIV->jumlahIV = $IVJumlah;
        }

        return view('pages.admin.rencana_kas.subkegiatan.index', compact('title', 'Subkegiatans'));
    }

    public function indexUraianSubkegiatan(){

          // confirm delete
          $title='Hapus Data!';
          $text="Apakah Anda Yakin?";
          confirmDelete($title, $text);


        $title = 'Uraian Subkegiatan';

        // $query = uraian_subkegiatan::with('');

        $query = DB::table('uraian_subkegiatans')
        ->select('*')
        ->join('rencana_kas', 'rencana_kas.id_uraian_subkegiatan', '=', 'uraian_subkegiatans.id_uraian_subkegiatan')
        ->join('rfk_subkegiatans', 'rfk_subkegiatans.id_subkegiatan', '=', 'uraian_subkegiatans.id_subkegiatan')
        ->get();


        return view('pages.admin.rencana_kas.uraian_subkegiatan.index', compact('title', 'query'));
    }

    public function createUraianSubkegiatan(){
        $program = rfk_program::all();
        return view('pages.admin.rencana_kas.uraian_subkegiatan.create',compact('program'));
    }

    public function storeUraianSubkegiatan(Request $request){

        $validasi = $request->validate([
            'id_data' => 'required',
            'id_kegiatan' => 'required',
            'id_subkegiatan' => 'required',
            'Uraian' => 'required',
            'triwulan_i' => 'required',
            'triwulan_ii' => 'required',
            'triwulan_iii' => 'required',
            'triwulan_iv' => 'required'
        ]);

        $cdata = rencanaKas::create([
            'id_program' => $validasi['id_data'],
            'id_kegiatan' => $validasi['id_kegiatan'],
            'id_subkegiatan' => $validasi['id_subkegiatan'],
            'id_uraian_subkegiatan' => $validasi['Uraian'],
            'triwulan_i' => $validasi['triwulan_i'],
            'triwulan_ii' => $validasi['triwulan_ii'],
            'triwulan_iii' => $validasi['triwulan_iii'],
            'triwulan_iv' => $validasi['triwulan_iv']
        ]);

        if($cdata == true){
            Alert::success('Sukses', 'Data Berhasil Ditambahkan');
            return redirect()->route('indexUraianSubkegiatan');
        }
        else{
            Alert::error('Gagal', 'Data Gagal Ditambahkan');
            return redirect()->back();
        }

    }

    public function editUraianSubkegiatan($id){

        $getid = rencanaKas::findorfail($id);
        $program = rfk_program::all();
        $k = rfk_kegiatan::where('id_kegiatan', $getid->id_kegiatan)->first();
        $sk = rfk_subkegiatan::where('id_subkegiatan', $getid->id_subkegiatan)->first();
        $u = uraian_subkegiatan::where('id_uraian_subkegiatan', $getid->id_uraian_subkegiatan)->first();

        return view('pages.admin.rencana_kas.uraian_subkegiatan.edit',compact('getid','program','k','sk','u'));
    }

    public function updateUraianSubkegiatan(Request $request, $id){
        $getid = rencanaKas::findorfail($id);

        $validasi = $request->validate([
            'id_data' => 'required',
            'id_kegiatan' => 'required',
            'id_subkegiatan' => 'required',
            'Uraian' => 'required',
            'triwulan_i' => 'required',
            'triwulan_ii' => 'required',
            'triwulan_iii' => 'required',
            'triwulan_iv' => 'required'
        ]);

        $Updatedata = $getid->update([
            'id_program' => $validasi['id_data'],
            'id_kegiatan' => $validasi['id_kegiatan'],
            'id_subkegiatan' => $validasi['id_subkegiatan'],
            'id_uraian_subkegiatan' => $validasi['Uraian'],
            'triwulan_i' => $validasi['triwulan_i'],
            'triwulan_ii' => $validasi['triwulan_ii'],
            'triwulan_iii' => $validasi['triwulan_iii'],
            'triwulan_iv' => $validasi['triwulan_iv']
        ]);


        if($Updatedata == true){
            Alert::success('Sukses', 'Data Berhasil Diubah');
            return redirect()->route('indexUraianSubkegiatan');
        }
        else{
            Alert::error('Gagal', 'Data Gagal Diubah');
            return redirect()->back();
        }

    }

    public function deleteUraianSubkegiatan($id){

        $getid = rencanaKas::findorfail($id);
        $getid->delete();

        if($getid == true){
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('indexUraianSubkegiatan');
        }
        else{
            Alert::error('Gagal', 'Data Gagal Dihapus');
            return redirect()->back();
        }
    }
}
