<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rfk_program extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sopd',
        "kode_a",
        "kode_a",
        "kode_b",
        "program_kode",
        "sasaran" ,
        "program" ,
        "indikator_kinerja",
        "kode_rekening" ,
        "pagu_program"  ,
    ];
}
