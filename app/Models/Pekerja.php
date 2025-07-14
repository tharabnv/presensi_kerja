<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pekerja',
        'nomor_pekerja',
        'divisi',
    ];
}
