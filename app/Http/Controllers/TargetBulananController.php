<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Indikator;
use App\Models\TargetBulanan;
use Illuminate\Http\Request;

class TargetBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $targetBulanans = TargetBulanan::where('user_id', '=', auth()->user()->id)->get();
        return view('pages.pegawai.targetBulanan.index', compact('targetBulanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indikators = Indikator::where('user_id', '=', auth()->user()->id)->get();
        return view('pages.pegawai.targetBulanan.add', compact('indikators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        TargetBulanan::create($data);

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect()->route('targetBulanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TargetBulanan $targetBulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TargetBulanan $targetBulanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TargetBulanan $targetBulanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TargetBulanan $targetBulanan)
    {
        //
    }
}
