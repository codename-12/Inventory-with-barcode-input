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
    'kode_kain', 
    'TOTAL',
    'tanggal',
    'NO_POL',
    'keterangan'

    ];


    public function kode(): BelongsToMany
    {
        return $this->belongsToMany(DFregkain_polos::class, 'kode_kain', 'kode_kain');
    }
}
