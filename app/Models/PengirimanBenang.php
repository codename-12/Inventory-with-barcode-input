<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanBenang extends Model
{
    use HasFactory;
    public $table = "pengiriman_benang";
    protected $fillable = [
         'tanggal',
         'id_penerimaan',
         'id_rajut', 
         'SJ', 
         'tipe_benang', 
         'id_supplier', 
         'BPB', 
         'jenis_benang', 
         'LOT', 
         'BOX_KRG', 
         'KG', 
         'BALE', 
         'keterangan'
    ];
    
    /**
     * Get the user associated with the PengirimanBenang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bsuppliers()
    {
        return $this->belongsTo(BenangSuppliers::class, 'id_supplier', 'id');
    }
    public function rajut()
    {
        return $this->belongsTo(Rajut_Benang::class,'id_rajut', 'id');
    }
}
