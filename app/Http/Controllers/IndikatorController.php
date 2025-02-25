<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Sasaran;
use App\Models\Indikator;
use App\Models\TargetBulanan;
use App\Models\TargetWaktu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indikators = Indikator::where('user_id','=', auth()->user()->id)->get();
        // confirm delete
        $title='Hapus Data!';
        $text="Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        return view('pages.pegawai.indikator.index', [
            'indikators' => $indikators,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $targetWaktus = TargetWaktu::all();
        $sasarans = Sasaran::where('user_id', '=', auth()->user()->id)->get();
        return view('pages.pegawai.indikator.add', compact('sasarans', 'targetWaktus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $insertIndikator = indikator::create($data);
        $lastInsertedId = $insertIndikator->id;

        if ($request->target_waktu_id == 1 && $insertIndikator) {
            $trgtBln = $request->target / 12;
            $dataTarget = [
                'user_id' => auth()->user()->id,
                'indikator_id' => $lastInsertedId ,
                'jan' => $trgtBln,
                'feb' => $trgtBln,
                'mar' => $trgtBln,
                'apr' => $trgtBln,
                'mei' => $trgtBln,
                'jun' => $trgtBln,
                'jul' => $trgtBln,
                'agu' => $trgtBln,
                'sep' => $trgtBln,
                'okt' => $trgtBln,
                'nov' => $trgtBln,
                'des' => $trgtBln,
            ];
            $insertTargetBulanan = TargetBulanan::create($dataTarget);
        }

        if ($insertIndikator) {
            Alert::success('Sukses', 'Data Berhasil Ditambahkan');
            return redirect()->route('indikator.index');
        } else {
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Indikator $indikator)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indikator $indikator)
    {
        $this->authorize('update', $indikator);

        $sasarans = Sasaran::where('user_id', '=', auth()->user()->id)->get();
        $targetWaktus = TargetWaktu::all();
        return view('pages.pegawai.indikator.edit', [
            'indikator' => $indikator,
            'sasarans' => $sasarans,
            'targetWaktus' => $targetWaktus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indikator $indikator)
    {
        $this->authorize('update', $indikator);

        $update = $indikator->update([
            "sasaran_id" => $request['sasaran_id'],
            "nama_indikator" => $request['nama_indikator'],
            "target" => $request['target'],
            "satuan" => $request['satuan'],
            "target_waktu_id" => $request['target_waktu_id'],
            "dari_bulan" => $request['dari_bulan'],
            "sampai_bulan" => $request['sampai_bulan'],
        ]);
        if($update == true){
            Alert::success('Sukses', 'Data Berhasil diubah');
            return redirect()->route('indikator.index');
        }
        else{
            Alert::error('Error!', 'Data Gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indikator $indikator)
    {
        $this->authorize('delete', $indikator);

        if ($indikator) {
            $indikator->delete();
            Alert::success('Sukses', 'Data Berhasil Dihapus');
            return redirect()->route('indikator.index');
        }

        Alert::error('Error!', 'Data Gagal Dihapus');
        return redirect()->back();
    }
}
