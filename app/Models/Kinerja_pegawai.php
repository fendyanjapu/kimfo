<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja_pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kinerja_harian',
        'target_bulanan',
        'iku_bidang',
        'tgl_input'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
