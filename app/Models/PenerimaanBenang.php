<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanBenang extends Model
{
    use HasFactory;
    public $table = "penerimaan_benang";
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'tanggal',
        'id_supplier',
        'BPB', 
        'SJ',
        'jenis_benang',  
        'tipe_benang', 
        'LOT', 
        'BOX_KRG', 
        'KG', 
        'BALE', 
        'keterangan'
    ];

    
    /**
     * Get the user that owns the PenerimaanBenang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bsuppliers()
    {
        return $this->belongsTo(BenangSuppliers::class, 'id_supplier', 'id');
    }
    public function bpbs()
    {
        return $this->belongsTo(BPB_benang::class, 'BPB', 'id');
    }
}
