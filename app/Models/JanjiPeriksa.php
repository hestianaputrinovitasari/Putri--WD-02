<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JanjiPeriksa extends Model
{
    protected $table = 'janji_periksas';
    protected $fillable = [
        'id_pasien',
        'id_jadwal',
        'status',
        'keluhan',
        'no_antrian',
    ];

    public function pasien():BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    public function jadwalPeriksa():BelongsTo
    {
        return $this->belongsTo(JadwalPeriksa::class, 'id_jadwal');
    }

    public function periksa():HasOne
    {
        return $this->hasOne(Periksa::class, 'id_janji_periksa');
    }

}
