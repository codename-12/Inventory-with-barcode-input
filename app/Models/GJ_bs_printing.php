<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_bs_printing extends Model
{
    use HasFactory;
    public $table = "bs_printing";
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
}
