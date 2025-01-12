<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja_pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'indikator_id',
        'kinerja_harian',
        'target_bulanan',
        'iku_bidang',
        'bukti_kegiatan',
        'tgl_input'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
