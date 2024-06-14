<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalidaSocio extends Model
{
    use HasFactory;
    protected $table = 'socios_salidas';
    protected $fillable = [
        'portero',
        'entrada',
        'salida',
        'identificador',
        'detalle'        
    ];
}
