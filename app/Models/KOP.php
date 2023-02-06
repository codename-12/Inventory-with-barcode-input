<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KOP extends Model
{
    use HasFactory;
    public $table = "kartu_order_proses";
    protected $fillable = [
      'NO_KOP',
      'NO_SSP-SJ',
      'id_customer',
      'tanggal',
      'jenis_kain',
      'lebar',
      'ROL',
      'KG',
      'LOT',
    ];

    /**
     * Get all of the penerimaans for the KOP
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function customer()
    {
        return $this->belongsTo(Customer_kain::class, 'id_customer', 'id');
    }   
}
