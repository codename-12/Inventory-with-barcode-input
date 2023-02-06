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
    public function penerimaan(): HasMany
    {
        return $this->hasMany(GJpenerimaan_kain::class, 'kode_kain', 'kode_kain');
    }
}
