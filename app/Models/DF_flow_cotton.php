<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DF_flow_cotton extends Model
{
    use HasFactory;
    public $table = "df_flowcotton";
    protected $fillable = [
        'kode_kain',
        'sc',
        'peroxine_killer',
        'celup',
        'netral',
        'shaving',
        'fixing',
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
