<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hardware extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',	
        
    ];
    public function inventario_h()
    {
        return $this->belongsTo(Inventario::class, 'hw_id');
        
    }
}
