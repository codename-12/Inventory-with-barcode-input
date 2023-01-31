<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaan_kain extends Model
{
    use HasFactory;
    public $table = "penerimaan_kain";
    protected $fillable = [
        'kode_barang',
        'tanggal',
        'id_customer',
        'jenis_kain',
        'warna',
        'kop',
        'LOT',
        'ROL',
        'KG',
        'jenis_stock',
        'keterangan',
    ];

    public function kops()
    {
        return $this->belongsTo(KOP::class, 'kop', 'id');
    }

    public function kode_barang()
    {
        return $this->hasMany(pengiriman_kain::class);
    }
  
    public function customer()
    {
        return $this->belongsTo(Customer_kain::class, 'id_customer', 'id');
    }       
}
