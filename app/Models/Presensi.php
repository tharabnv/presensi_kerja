<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pekerja',
        'nomor_pekerja',
        'waktu_presensi',
        'keterangan',
    ];
}
