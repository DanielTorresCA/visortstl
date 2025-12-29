<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Printer extends Model
{
    use HasFactory;
    protected $table = 'printers';
    protected $fillable = [
        'brand',
        'model',
    ];

    public function printJobs(): HasMany
    {
        return $this->hasMany(PrintJob::class);
    }
}
