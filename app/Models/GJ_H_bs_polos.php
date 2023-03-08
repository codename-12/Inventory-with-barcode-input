<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_H_bs_polos extends Model
{
    use HasFactory;
    public $table = "h_bs_polos";
    protected $fillable = [
        'kode_kain',
        'tanggal_masuk',
        'tanggal_kirim',
        'keterangan',
    ];
}
