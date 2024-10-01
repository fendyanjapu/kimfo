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

    public function subkegiatan(){
        return $this->belongsTo(rfk_subkegiatan::class, 'id_subkegiatan', 'id_subkegiatan');
    }


}
