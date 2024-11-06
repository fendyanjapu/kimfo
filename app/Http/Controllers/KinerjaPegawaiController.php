<?php

namespace App\Http\Controllers;

use App\Models\Kinerja_pegawai;
use Illuminate\Http\Request;

class KinerjaPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kinerjaPegawai = Kinerja_pegawai::all();

        return view('pages.admin.kinerja_pegawai.index', ['query' => $kinerjaPegawai]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kinerja_pegawai $kinerja_pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kinerja_pegawai $kinerja_pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kinerja_pegawai $kinerja_pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kinerja_pegawai $kinerja_pegawai)
    {
        //
    }
}
