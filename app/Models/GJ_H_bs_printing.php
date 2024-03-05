<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_H_bs_printing extends Model
{
    use HasFactory;
    public $table = "h_bs_printing";
    protected $fillable = [
        'kode_kain',
        'kg',
        'tanggal_masuk',
        'tanggal_kirim',
        'keterangan',
    ];

    public function kode()
    {
        return $this->belongsTo(DFregkain_printing::class, 'kode_kain', 'kode_kain');
    }
}
