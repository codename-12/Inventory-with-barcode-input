<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_H_bs_polos extends Model
{
    use HasFactory;
    public $table = "h_bs_polos";
    protected $fillable = [
        'kode_kain',
        'kg',
        'tanggal_masuk',
        'tanggal_kirim',
        'keterangan',
    ];

    public function kode()
    {
        return $this->belongsTo(DFregkain_polos::class, 'kode_kain', 'kode_kain');
    }
    
}
