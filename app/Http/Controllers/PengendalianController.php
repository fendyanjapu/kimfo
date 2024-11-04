<?php

namespace App\Http\Controllers;

use App\Models\rfk_kegiatan;
use App\Models\rfk_program;
use App\Models\rfk_subkegiatan;
use App\Models\uraian_subkegiatan;
use Illuminate\Http\Request;

class PengendalianController extends Controller
{
    public function program()
    {
        $rfkProgram = rfk_program::all();
        return view('pages.admin.pengendalian.program', [
            'query' => $rfkProgram,
        ]);
    }

    public function kegiatan()
    {
        $rfkKegiatan = rfk_kegiatan::all();
        return view('pages.admin.pengendalian.kegiatan', [
            'query' => $rfkKegiatan,
        ]);
    }

    public function subkegiatan()
    {
        $rfkSubegiatan = rfk_subkegiatan::all();
        return view('pages.admin.pengendalian.subkegiatan', [
            'query' => $rfkSubegiatan,
        ]);
    }

    public function uraian_subkegiatan()
    {
        $urananSubkegiatan = uraian_subkegiatan::all();
        return view('pages.admin.pengendalian.uraian-subkegiatan', [
            'query' => $urananSubkegiatan,
        ]);
    }
}
