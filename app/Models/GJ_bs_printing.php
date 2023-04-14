<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJ_bs_printing extends Model
{
    use HasFactory;
    public $table = "gj_bs_printing";
    protected $fillable = [
        'tanggal_masuk',
        'kode_kain',
        'kg'
    ];

    public function kode()  
    {
        return $this->belongsTo(DFregkain_printing::class, 'kode_kain', 'kode_kain');
    }

}
