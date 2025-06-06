<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja_pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sasaran_id',
        'indikator_id',
        'kinerja_harian',
        'jumlah',
        'satuan',
        'bukti_kegiatan',
        'tgl_input',
        'jam_awal',
        'jam_akhir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sasaran_utama()
    {
        return $this->belongsTo(SasaranUtama::class);
    }

    public function sasaran()
    {
        return $this->belongsTo(Sasaran::class);
    }

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
