<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceBenang extends Model
{
    use HasFactory;
    public $table = "invoice_benang";
    protected $fillable = [
        'tanggal',                                   
        'BPB',
        'total_pembayaran',
    ];
    
    public function bpb()
    {
        return $this->belongsTo(BPB_benang::class, 'BPB', 'id');
    }
}
