<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrintJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'printer_id',
        'filament_id',
        'proyect_id',
        'hours',
        'grams_used',
        'is_completed',
        'printed_at',
    ];

    protected $casts = [
        'hours' => 'decimal:2',
        'is_completed' => 'boolean',
        'printed_at' => 'datetime',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Proyect::class);
    }

    public function printer(): BelongsTo
    {
        return $this->belongsTo(Printer::class);
    }

    public function filament(): BelongsTo
    {
        return $this->belongsTo(Filament::class);
    }

    public function fails(): HasMany
    {
        return $this->hasMany(PrintJobfails::class);
    }
}
