<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_rek',
        'no_kupon',
        'nama',
        'area',
        'plafon',
        'kelipatan_plafon',
        'kelipatan_topup',
        'jumlah_kupon',
        'tgl_buka',
        'tgl_jt',
        'kab_kota',
    ];
}
