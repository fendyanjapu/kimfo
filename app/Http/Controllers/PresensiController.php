<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presensi = Presensi::where('user_id', '=', auth()->user()->id)->where('tanggal', '=', date('Y-m-d'));
        if ($presensi->count() == 0) {
            return redirect()->route('presensi.create');
        } else {
            return view('pages.pegawai.presensi.show', [
                'presensi' => $presensi->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pegawai.presensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $request->image;    
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid().time().'.png';

        $folderPath = 'upload/presensi/';
        $file = $folderPath . $fileName;

        file_put_contents($file, $image_base64);

        Presensi::create([
            'user_id' => auth()->user()->id,
            'tanggal' => date('Y-m-d'),
            'jam_masuk' => date('H:i:s'),
            'gambar_masuk' => $fileName,
        ]);
        Alert::success('Hore!', 'Anda berhasil mengisi presensi');
        return redirect()->route('presensi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presensi $presensi)
    {
        //
    }
}
