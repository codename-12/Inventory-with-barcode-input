<?php

namespace App\Models;
use App\Events\GJpengirimanKainSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJpengiriman_kain extends Model
{
    use HasFactory;
    public $table = "pengiriman_kain";
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => GJpengirimanKainSaved::class,
    ];
    protected $fillable = [
    'tanggal_kirim',
    'no_po',
    'kode_kain',
    'kg'

    ];


}
