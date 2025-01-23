<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranUtama extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sasaran_strategis',
        'indikator_kinerja',
        'target',
    ];
}
