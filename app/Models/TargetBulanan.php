<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetBulanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'indikator_id',
        'jan',
        'feb',
        'mar',
        'apr',
        'mei',
        'jun',
        'jul',
        'agu',
        'sep',
        'okt',
        'nov',
        'des',
    ];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }
}
