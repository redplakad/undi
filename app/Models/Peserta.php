<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';

    protected $fillable = [
        'NOREK',
        'NAMA',
        'KOTA',
        'NO_IDENTITAS',
        'JENIS_PRODUK',
        'STATUS',
    ];
}