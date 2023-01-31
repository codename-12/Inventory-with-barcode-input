<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenangSuppliers extends Model
{
    use HasFactory;
    public $table = "supplier_benang";
    protected $fillable = [
        'nama_supplier',                                   
        'saldo',
        'hutang',
        'keterangan',
    ];
    /**
     * Get all of the master_benang for the BenangSuppliers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function master_benang()
    {
        return $this->hasMany(Master_benang::class);
    }
}
