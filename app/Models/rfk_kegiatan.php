<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rfk_kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sopd',
        "id_program",
        "kegiatan_kode",
        "kegiatan_sasaran",
        "kegiatan",
        "kegiatan_indikator_kinerja",
        "kode_rekening",
        "pagu_kegiatan" ,
    ];

    protected $primaryKey = 'id_kegiatan';


    public function program()
    {
        return $this->belongsTo(rfk_program::class, 'id_program', 'id_program');
    }


}
