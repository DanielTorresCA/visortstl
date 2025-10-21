<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    use HasFactory;
    protected $table='proyects';
    protected $fillable = [
        'name',
        'description',
        'status',
        'deadline',
        'completed_at',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
