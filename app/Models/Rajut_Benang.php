<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rajut_Benang extends Model
{
    use HasFactory;
    public $table = "rajut";
    protected $fillable = [
        'nama_rajut',                                   
        'saldo',
    ];

    public function pengirimanbenang()
    {
        return $this->hasMany(PengirimanBenang::class);
    }
}
