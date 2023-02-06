<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DF_flow_tc extends Model
{
    use HasFactory;
    public $table = "df_flowtc";
    protected $fillable = [
        'kode_kain',
        'scouring_bleaching',
        'celup_poly',
        'RO',
        'celuup_reaktif',
        'netral',
        'shaving',
        'rf',
        'status',
    ];
    /**
     * Get the dfregkainpolos that owns the DF_flow_cotton
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dfregkainpolos(): BelongsTo
    {
        return $this->belongsTo(DFregkain_polos::class, 'kode_kain', 'kode_kain');
    }
}
