<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PesertaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Peserta([
            'NOREK' => $row['norek'], // Gantilah dengan nama kolom yang sesuai
            'NAMA' => $row['nama'],
            'KOTA' => $row['kota'],
            'NO_IDENTITAS' => $row['no_identitas'],
            'JENIS_PRODUK' => $row['jenis_produk'],
        ]);
    }
}