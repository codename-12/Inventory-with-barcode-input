<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman_kain extends Model
{
    use HasFactory;
    public $table = "pengiriman_kain";
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
    'id_customer',
    'SP_NO',
    'jenis_kain',
    'kop',
    'kode_barang', 
    'NO_PO',
    'TOTAL',
    'tanggal',
    'NO_POL',
    'keterangan'

    ];


    /** 
     * Get the KOP that owns the pengiriman_kain
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kop()
    {
        return $this->belongsTo(KOP::class, 'kop', 'id');
    }
    /**
     * Get all of the kode_barang for the pengiriman_kain
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */  
    /**
     * Get all of the penerimaan_kain for the pengiriman_kain
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penerimaan_kain(): HasMany
    {
        return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    }

    public function customer()
    {
        return $this->belongsTo(Customer_kain::class, 'id_customer', 'id');
    }

}
