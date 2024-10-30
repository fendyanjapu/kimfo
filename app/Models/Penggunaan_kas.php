<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunaan_kas extends Model
{
    use HasFactory;

    protected $fillable = [
        'bukti_keg',
        'bulan',
        'id_kegiatan',
        'id_program',
        'id_sopd',
        'id_subkegiatan',
        'keterangan',
        'pagu',
        'tanggal',
        'triwulan',
        'uraian',
    ];

    public function subkegiatan()
    {
        return $this->belongsTo(rfk_subkegiatan::class, 'id_subkegiatan', 'id_subkegiatan');
    }

    public function uraian_subkegiatan()
    {
        return $this->belongsTo(uraian_subkegiatan::class, 'uraian', 'id_uraian_subkegiatan');
    }
}
