<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_kain extends Model
{
    use HasFactory;
    public $table = "customer";
    protected $fillable = [
        'nama_customer',
        'keterangan',
    ];

}
