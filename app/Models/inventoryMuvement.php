<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class inventoryMuvement extends Model
{
    use HasFactory;
    protected $table = "inventory_muvements";

    protected $fillable = [
        'inventory_id',
        'quantity',
        'type',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Filament::class);
    }
}
