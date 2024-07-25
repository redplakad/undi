<?php

namespace App\Imports;

use App\Models\Hadiah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HadiahImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Hadiah([
            'nama_hadiah' => $row['nama_hadiah'],
            'stok_hadiah' => $row['stok_hadiah'],
            'foto' => $row['foto'],
            'keterangan' => $row['keterangan'],
            'level' => $row['level'],
        ]);
    }
}
