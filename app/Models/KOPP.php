<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KOPP extends Model
{
    use HasFactory;
    public $table = "kartu_order_proses_printing";
    protected $fillable = [
      'NO_KOPP',
      'NO_SSP-SJ',
      'id_customer',
      'jenis_kain',
      'tanggal',
      'design',
      'lebar',
      'ROL',
      'KG',
      'LOT',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer_kain::class, 'id_customer', 'id');
    }   
}
