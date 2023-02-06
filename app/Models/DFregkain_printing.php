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
        'id_customer',
        'jenis_kain',
        'kode_desain',
        'kop',
        'LOT',
        'ROL',
        'KG',
        'keterangan',
    ];
}
