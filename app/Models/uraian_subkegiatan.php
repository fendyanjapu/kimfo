<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uraian_subkegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_subkegiatan',
        'id_kegiatan',
        'id_program',
        'kode_rekening',
        'uraian',
        'pagu'
    ];

    protected $primaryKey = 'id_uraian_subkegiatan';

    public function program(){
        return $this->belongsTo(rfk_program::class, 'id_program', 'id_program');
    }

    public function kegiatan(){
        return $this->belongsTo(rfk_kegiatan::class, 'id_kegiatan', 'id_kegiatan');
    }

    public function subkegiatan(){
        return $this->belongsTo(rfk_subkegiatan::class, 'id_subkegiatan', 'id_subkegiatan');
    }

    public function penggunaanKas() {
        return $this->hasMany(Penggunaan_kas::class, 'id_uraian_subkegiatan','id_uraian_subkegiatan');
    }


}
