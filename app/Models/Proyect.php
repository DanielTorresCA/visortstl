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
        'customer',
        'description',
        'status',
        'deadline',
        'completed_at',
        'price',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
