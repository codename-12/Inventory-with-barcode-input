<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GJpenerimaan_kain extends Model
{
    use HasFactory;
    public $table = 'penerimaan_kain';
    protected $fillable = ['tanggal_masuk', 'kode_kain', 'kg','kainable_id','kainable_type'];


}
