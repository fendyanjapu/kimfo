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

    public function getTarget(Request $request)
    {
        $id = $request->id;
        $indikator = Indikator::findOrFail($id);

        return json_encode($indikator);
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
        $indikators = Indikator::where('user_id', '=', auth()->user()->id)->get();
        $query = Indikator::where('id', '=', $targetBulanan->indikator_id)->first();
        $target = $query->target;
        return view('pages.pegawai.targetBulanan.edit', compact('indikators', 'targetBulanan', 'target'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TargetBulanan $targetBulanan)
    {
        $update = $targetBulanan->update([
            "indikator_id" => $request['indikator_id'],
            "jan" => $request['jan'],
            "feb" => $request['feb'],
            "mar" => $request['mar'],
            "apr" => $request['apr'],
            "mei" => $request['mei'],
            "jun" => $request['jun'],
            "jul" => $request['jul'],
            "agu" => $request['agu'],
            "sep" => $request['sep'],
            "okt" => $request['okt'],
            "nov" => $request['nov'],
            "des" => $request['des'],
        ]);
        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('sasaran.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TargetBulanan $targetBulanan)
    {
        if ($targetBulanan) {
            $targetBulanan->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('targetBulanan.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}
