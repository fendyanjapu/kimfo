<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rencanaKas extends Model
{
    use HasFactory;

    protected $table = 'rencana_kas';
    protected $primaryKey = 'id_rencana_kas';
    protected $fillable = ([
        'id_program',
        'id_kegiatan',
        'id_subkegiatan',
        'id_uraian_subkegiatan','triwulan_i',
        'triwulan_ii','triwulan_iii','triwulan_iv'
    ]);


}
