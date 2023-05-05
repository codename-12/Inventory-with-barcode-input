<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_H_stock_polos extends Model
{
    use HasFactory;
    public $table = "h_stock_polos";
    protected $fillable = [
        'kode_kain',
        'tanggal_masuk',
        'tanggal_kirim',
        'keterangan',
    ];
    
    public function kode()
    {
        return $this->belongsTo(DFregkain_polos::class, 'kode_kain', 'kode_kain');
    }
}
