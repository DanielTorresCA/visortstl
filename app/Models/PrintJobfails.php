<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrintJobfails extends Model
{
    protected $table = 'print_jobfails';
    protected $fillable = [
        'print_job_id',
        'reason',
        'grams_lost',
        'hours_lost',
    ];

    protected $casts = [
        'hours_lost' => 'decimal:2',
    ];

    public function print_job(): BelongsTo
    {
        return $this->belongsTo(PrintJob::class);
    }
}