<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Penggunaan_kas;
use App\Models\rfk_program;
use Illuminate\Http\Request;

class PenggunaanKasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunaan_kas = Penggunaan_kas::with('subkegiatan')->with('uraian_subkegiatan')
        ->orderBy('created_at', 'DESC')
        ->get();
        return view('pages.admin.penggunaan_kas.index', compact('penggunaan_kas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rfk_program = rfk_program::all();
        return view('pages.admin.penggunaan_kas.add', compact('rfk_program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bulan = $request->bulan;
        if ($bulan <= 3) {
		    $triwulan = 'i';
		} elseif ($bulan <= 6) {
		    $triwulan = 'ii';
		} elseif ($bulan <= 9) {
		    $triwulan = 'iii';
		} elseif ($bulan <= 12) {
		    $triwulan = 'iv';
		} else {
		    $triwulan = '';
		}

        if ($request->file('gbr')->getSize() <= 4000000) {
            $gbr =$request->file('gbr');
            $tujuan_upload = 'upload';
            $nama = str_replace(' ', '', $gbr->getClientOriginalName());
            $nama_gbr = time()."_".$nama; 
            $gbr->move($tujuan_upload,$nama_gbr);
            
             Penggunaan_kas::create([
                'bukti_keg' => $nama_gbr,
                'bulan' => $request->bulan,
                'id_kegiatan' => $request->id_kegiatan,
                'id_program' => $request->id_program,
                'id_sopd' => 0,
                'id_subkegiatan' => $request->id_subkegiatan,
                'keterangan' => $request->keterangan,
                'pagu' => $request->pagu,
                'tanggal' => date('Y-m-d'),
                'triwulan' => $triwulan,
                'uraian' => $request->uraian,
            ]);
            Alert::success('Hore!', 'Data berhasil disimpan');
            return redirect()->route('penggunaan_kas.index');
        } else {
            echo "<script>
                alert('Ukuran file maksimal 4 MB');
                self.history.back();
                </script>";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penggunaan_kas $penggunaan_ka)
    {
        $data = Penggunaan_kas::find($penggunaan_ka->id);
        
        return view('pages.admin.penggunaan_kas.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penggunaan_kas $penggunaan_kas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penggunaan_kas $penggunaan_kas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penggunaan_kas $penggunaan_kas)
    {
        //
    }
}
