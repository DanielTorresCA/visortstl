<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Filament extends Model
{
    use HasFactory;

    protected $table = 'filaments';
    protected $fillable = [
        'brand',        // Marca
        'type',         // Tipo (PLA, PETG)
        'color',        // Color
        'startWeight',  // Peso inicial
        'actualWeight', // Peso actual (El que iremos descontando)
        'quantity',     // Cantidad de rollos
    ];


    protected $casts = [
        'startWeight' => 'integer',
        'actualWeight' => 'integer',
        'quantity' => 'integer'
    ];

    public function printJobs(): HasMany
    {
        return $this->hasMany(PrintJob::class);
    }

    public function inventoryMovements(): HasMany
    {
        return $this->hasMany(inventoryMuvement::class);
    }
}
