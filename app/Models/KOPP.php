<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KOPP extends Model
{
    use HasFactory;
    public $table = "kartu_order_proses";
    protected $fillable = [
      'NO_KOP',
      'NO_SSP-SJ',
      'id_customer',
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
