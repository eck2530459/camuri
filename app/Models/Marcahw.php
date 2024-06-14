<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcahw extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',	
        
    ];
    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'marca_id');
        
    }
}
