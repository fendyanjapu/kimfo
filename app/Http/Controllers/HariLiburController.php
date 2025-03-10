<?php

namespace App\Http\Controllers;

use App\Models\HariLibur;
use Illuminate\Http\Request;
use Alert;

class HariLiburController extends Controller
{
    private $rules = [
        'tanggal_libur' => 'required|date',
    ];
    public function index()
    {
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);

        $query = HariLibur::all();
        return view('pages.admin.hariLibur.index', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.hariLibur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules);
        HariLibur::create($validatedData);
        return redirect()->route('hariLibur.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HariLibur $hariLibur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HariLibur $hariLibur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HariLibur $hariLibur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HariLibur $hariLibur)
    {
        //
    }
}
