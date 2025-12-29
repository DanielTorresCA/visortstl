<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Proyect extends Model
{
    use HasFactory;

    protected $table = 'proyects';
    protected $fillable = [
        'name',
        'customer',
        'description',
        'status',
        'deadline',
        'completed_at',
        'price',
        'user_id',
        'printTime',
        'materialUsed',
        'isFail'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function printJobs(): HasMany
    {
        return $this->hasMany(PrintJob::class);
    }

}
