<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_H_bs_polos extends Model
{
    use HasFactory;
    public $table = "h_bs_polos";
    protected $fillable = [
        'kode_barang',
        'kode_kain',
        'tanggal_masuk',
        'id_pengiriman',
        'keterangan',
    ];
}
