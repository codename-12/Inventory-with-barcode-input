<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DFregkain_printing extends Model
{
    use HasFactory;
    public $table = "df_regkain_printing";
    protected $fillable = [
        'kode_kain',
        'tanggal',
        'kop',
        'warna',
        'LOT',
        'ROL',
        'KG',
        'keterangan',
    ];
    public function penerimaan_kain()
    {
        return $this->morphMany(GJpenerimaan_kain::class, 'kainable', 'tipe_kain', 'kode_kain');
    }
    public function no_kop()
    {
        return $this->belongsTo(KOPP::class, 'kop', 'id');
    }
}

