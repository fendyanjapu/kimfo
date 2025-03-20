<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaianKinerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'indikator_id',
        'bulan',
        'jumlah',
        'bukti_capaian',
        'verifikasi',
    ];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
