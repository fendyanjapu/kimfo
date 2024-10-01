<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rfk_subkegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_sopd',
        "id_kegiatan",
        "subkegiatan_kode",
        "subkegiatan_sasaran",
        "subkegiatan",
        "subkegiatan_indikator_kinerja",
        "pagu_subkegiatan",
    ];

    protected $primaryKey = 'id_subkegiatan';

    // relasi rfk_kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(rfk_kegiatan::class, 'id_kegiatan', 'id_kegiatan');
    }

}
