<?php

namespace App\Http\Controllers;

use App\Models\uraian_subkegiatan;
use Illuminate\Http\Request;

class KartuKendaliController extends Controller
{
    public function index()
    {
        $query = uraian_subkegiatan::all();

        return view('pages.admin.kartu_kendali.index', [ 'query' => $query ]);
    }
}
