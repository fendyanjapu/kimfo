<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja_pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'pegawai_id',
        'kinerja_harian',
        'target_bulanan',
        'iku_bidang',
        'tgl_input'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
}
