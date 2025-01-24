<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_arsip_id',
        'nama_arsip',
        'keterangan',
        'file',
    ];
}
