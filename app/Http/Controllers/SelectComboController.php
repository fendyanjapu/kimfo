<?php

namespace App\Http\Controllers;

use App\Models\rfk_kegiatan;
use App\Models\rfk_subkegiatan;
use App\Models\rfk_program;
use App\Models\uraian_subkegiatan;
use Illuminate\Http\Request;

class SelectComboController extends Controller
{
       // select kode program
       public function selectKodeProgram(Request $request){
        $kode = $request->id_kode;

        $ambildata = rfk_program::where('id_program', $kode)
        ->get();
        $data = [];

        foreach($ambildata as $item){
            $data[] = array(
                'kode_a' => $item->kode_a,
                'kode_b' => $item->kode_b,
                'program_kode' => $item->program_kode,
            );
        }

        return response()->json($data);
    }
       // select program
       public function selectProgram(Request $request){
        $kode = $request->id_kode;

        $ambildata = rfk_kegiatan::where('id_program', $kode)
        ->with('program')
        ->get();
        $data = [];

        foreach($ambildata as $item){
            $data[] = array(
                'id_kegiatan' => $item->id_kegiatan,
                'kegiatan' => $item->kegiatan,
            );
        }

        return response()->json($data);
    }

    // select kegiatan
    public function selectKegiatan(Request $request){
        $kode = $request->id_kode;

        // $ambildata = rfk_program::where('id_program', $kode);
        $ambildata = rfk_kegiatan::where('id_kegiatan', $kode)
        ->with('program')
        ->get();
        $data = [];

        foreach($ambildata as $item){
            $data[] = array(
                'kode_a' => $item->program->kode_a,
                'kode_b' => $item->program->kode_b,
                'program_kode' => $item->program->program_kode,
                'kegiatan_kode' => $item->kegiatan_kode,
            );
        }

        return response()->json($data);
    }

       // select kegiatan
       public function selectKkegiatan(Request $request){
           $kode = $request->id_kode;

           $ambildata = rfk_subkegiatan::where('id_kegiatan', $kode)
           ->with('kegiatan')
           ->get();
        $data = [];

        foreach($ambildata as $item){
            $data[] = array(
                'id_subkegiatan' => $item->id_subkegiatan,
                'subkegiatan' => $item->subkegiatan,
            );
        }

        return response()->json($data);
    }

       // select kegiatan
       public function selectSubkegiatan(Request $request){
           $kode = $request->id_kode;

           $ambildata = uraian_subkegiatan::where('id_subkegiatan', $kode)
           ->with('subkegiatan')
           ->get();

        $data = [];

        foreach($ambildata as $item){
            $data[] = array(
                'id_uraian_subkegiatan' => $item->id_uraian_subkegiatan,
                'uraian' => $item->uraian,
            );
        }

        return response()->json($data);
    }
}
