<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sasaran_utama_id',
        'nama_sasaran',
    ];

    public function sasaran_utama()
    {
        return $this->belongsTo(SasaranUtama::class, 'sasaran_utama_id', 'id');
    }
}
