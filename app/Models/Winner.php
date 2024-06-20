<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_id',
        'prize_id',
        'region_id',
    ];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function prize()
    {
        return $this->belongsTo(Prize::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
