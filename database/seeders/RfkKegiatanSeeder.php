<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RfkKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rfkKegiatan = DB::connection('mysql2')->table('rfk_kegiatan')->get();
        foreach($rfkKegiatan as $newrfkKegiatan){
            DB::connection('mysql')->table('rfk_kegiatans')->insert([
               'id_kegiatan' => $newrfkKegiatan->id_kegiatan,
               'id_sopd' => $newrfkKegiatan->id_sopd,
               'id_program' => $newrfkKegiatan->id_program,
               'kegiatan_kode' => $newrfkKegiatan->kegiatan_kode,
               'kegiatan_sasaran' => $newrfkKegiatan->kegiatan_sasaran,
               'kegiatan' => $newrfkKegiatan->kegiatan,
               'kegiatan_indikator_kinerja' => $newrfkKegiatan->kegiatan_indikator_kinerja,
               'kode_rekening' => $newrfkKegiatan->kode_rekening,
               'pagu_kegiatan' => $newrfkKegiatan->pagu_kegiatan,
               'created_at' => NOW(),
               'updated_at' => NOW(),
            ]);
        }
    }
}

