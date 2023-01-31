<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_benang extends Model
{
    use HasFactory;
    public $table = "master_benang";
   /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'id_supplier',
        'jenis_benang', 
        'tipe_benang', 
        'LOT', 
        'BOX_KRG', 
        'KG', 
        'BALE', 
        'keterangan'
    ];
    /**
     * Get the BenangSuppliers that owns the Master_benang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bsuppliers()
    {
        return $this->belongsTo(BenangSuppliers::class, 'id_supplier', 'id');
    }
}
