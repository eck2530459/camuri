<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialInventario extends Model
{
    protected $table = 'historial_inventario';

    use HasFactory;
    protected $fillable = [
        'hw_id',	
        'user_id',        
        'marca_id',        	
        'razon_status',	
        'cantidad',	
        'serial',        	
        'creado_por',        	
        
    ];
}
