<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPB_benang extends Model
{
    use HasFactory;
    public $table = "bpb_benang";
    protected $fillable = [
        'no_bpb',
        'id_supplier',
        'surat_jalan',                                   
        'harga',
        'pembayaran',
        'status',
    ];
    /**
     * Get the  associated with the BPB_benang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bsuppliers()
    {
        return $this->belongsTo(BenangSuppliers::class,'id_supplier','id');
    }
    /**
     * Get all of the penerimaan for the BPB_benang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penerimaan()
    {
        return $this->hasMany(PenerimaanBenang::class);
    }
}
