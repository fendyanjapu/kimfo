<?php

namespace App\Http\Controllers;

use App\Models\CapaianKinerja;
use Illuminate\Http\Request;

class CapaianKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $capaianKinerjas = CapaianKinerja::where('user_id', '=', auth()->user()->id)->get();
        return view('pages.pegawai.capaianKinerja.index', compact('capaianKinerjas'));
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
    public function show(CapaianKinerja $capaianKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CapaianKinerja $capaianKinerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CapaianKinerja $capaianKinerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CapaianKinerja $capaianKinerja)
    {
        //
    }
}
