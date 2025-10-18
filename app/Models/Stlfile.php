<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stlfile extends Model
{
    use Hasfactory;
    protected $table = 'stlfile';
    
 protected $fillable = ['fileName','filePath','category_id','isActive'];
protected $casts = ['isActive' => 'boolean'];

       public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
