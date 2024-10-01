<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class rfk_program extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rfkProgram = DB::connection('mysql2')->table('rfk_program')->get();

        foreach($rfkProgram as $newrfkProgram){
            DB::connection('mysql')->table('rfk_programs')->insert([
               'id_program' => $newrfkProgram->id_program,
               'id_sopd' => $newrfkProgram->id_sopd,
               'kode_a' => $newrfkProgram->kode_a,
               'kode_b' => $newrfkProgram->kode_b,
               'program_kode' => $newrfkProgram->program_kode,
               'sasaran' => $newrfkProgram->sasaran,
               'program' => $newrfkProgram->program,
               'indikator_kinerja' => $newrfkProgram->indikator_kinerja,
               'kode_rekening' => $newrfkProgram->kode_rekening,
               'pagu_program' => $newrfkProgram->pagu_program,
               'created_at' => NOW(),
               'updated_at' => NOW(),
            ]);
        }
    }
}

