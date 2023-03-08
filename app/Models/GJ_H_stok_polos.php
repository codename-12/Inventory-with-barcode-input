<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_H_stok_polos extends Model
{
    use HasFactory;
    public $table = "h_stock_polos";
    protected $fillable = [
        'kode_kain',
        'tanggal_masuk',
        'tanggal_kirim',
        'keterangan',
    ];
}
