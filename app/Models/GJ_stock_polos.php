<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_stock_polos extends Model
{
    use HasFactory;
    public $table = "gj_stock_polos";
    protected $fillable = [
        'tanggal_masuk',
        'kode_kain',
        'kg'
    ];

    public function kode()
    {
        return $this->belongsTo(DFregkain_polos::class, 'kode_kain', 'kode_kain');
    }
    
}
