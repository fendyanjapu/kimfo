<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UraianSubkegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uraian_kegiatan = DB::connection('mysql2')->table('uraian_subkegiatan')->get();
        foreach($uraian_kegiatan as $newUKegiatan){
            DB::connection('mysql')->table('uraian_subkegiatans')->insert([
               'id_uraian_subkegiatan' => $newUKegiatan->id_uraian_subkegiatan,
               'id_subkegiatan' => $newUKegiatan->id_subkegiatan,
               'id_kegiatan' => $newUKegiatan->id_kegiatan,
               'id_program' => $newUKegiatan->id_program,
               'kode_rekening' => $newUKegiatan->kode_rekening,
               'uraian' => $newUKegiatan->uraian,
               'pagu' => $newUKegiatan->pagu,
               'created_at' => NOW(),
               'updated_at' => NOW(),
            ]);
        }
    }
}
