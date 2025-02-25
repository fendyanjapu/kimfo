<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sasaran_id',
        'nama_indikator',
        'target',
        'satuan',
        'target_waktu_id',
        'dari_bulan',
        'sampai_bulan',
    ];

    public function sasaran()
    {
        return $this->belongsTo(Sasaran::class);
    }

    public function targetWaktu()
    {
        return $this->belongsTo(TargetWaktu::class);
    }
}
