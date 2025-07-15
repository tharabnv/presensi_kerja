<?php

namespace App\Imports;

use App\Models\Pekerja;
use Maatwebsite\Excel\Concerns\ToModel;

class PekerjaImport implements ToModel
{
    public function model(array $row)
    {
        return new Pekerja([
            'nama_pekerja'   => $row[0],
            'nomor_pekerja'  => $row[1],
            'divisi'         => $row[2],
        ]);
    }
}