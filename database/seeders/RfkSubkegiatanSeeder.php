<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RfkSubkegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rfkSubkegiatan = DB::connection('mysql2')->table('rfk_subkegiatan')->get();
        foreach($rfkSubkegiatan as $newrfkSubkegiatan){
            DB::connection('mysql')->table('rfk_subkegiatans')->insert([
               'id_subkegiatan' => $newrfkSubkegiatan->id_subkegiatan,
               'id_sopd' => $newrfkSubkegiatan->id_sopd,
               'id_kegiatan' => $newrfkSubkegiatan->id_kegiatan,
               'subkegiatan_kode' => $newrfkSubkegiatan->subkegiatan_kode,
               'subkegiatan_sasaran' => $newrfkSubkegiatan->subkegiatan_sasaran,
               'subkegiatan' => $newrfkSubkegiatan->subkegiatan,
               'subkegiatan_indikator_kinerja' => $newrfkSubkegiatan->subkegiatan_indikator_kinerja,
               'pagu_subkegiatan' => $newrfkSubkegiatan->pagu_subkegiatan,
               'created_at' => NOW(),
               'updated_at' => NOW(),
            ]);
        }
    }
}
