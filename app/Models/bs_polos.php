<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bs_polos extends Model
{
    use HasFactory;
    public $table = "bs_polos";
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
   /**
     * Get the kop that owns the pengiriman_kain
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kop()
    {
        return $this->belongsTo(KOP::class, 'kop', 'id');
    }
    /**
     * Get the customer that owns the penerimaan_kain_polos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */     
    public function customer()
    {
        return $this->belongsTo(Customer_kain::class, 'id_customer', 'id');
    }  
        public function penerimaan()
    {
        return $this->belongsTo(penerimaan_kain::class, 'id_penerimaan', 'id');
    }
    public function pengiriman()
    {
        return $this->belongsTo(pengiriman_kain::class, 'id_pengiriman', 'id');
    }   
}
