<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DFregkain_polos extends Model
{
    use HasFactory;
    public $table = "df_regkain_polos";
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
    /**
     * Get all of the penerimaan for the DFregkain_polos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     public function penerimaan_kain()
    {
        return $this->morphMany(GJpenerimaan_kain::class, 'kainable', 'tipe_kain', 'kode_kain');
    }
    public function no_kop()
    {
        return $this->belongsTo(KOP::class, 'kop', 'id');
    }
}
