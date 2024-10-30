<?php

namespace App\Http\Controllers;

use App\Models\rfk_program;
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
}
