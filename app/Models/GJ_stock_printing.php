<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_stock_printing extends Model
{
    use HasFactory;
    public $table = "stock_printing";
    protected $fillable = [
        'kode_barang',
        'id_customer',
        'jenis_kain',
        'warna',
        'kop',
        'LOT',
        'ROL',
        'id_penerimaan',
        'id_pengiriman',
        'keterangan',
    ];

}
