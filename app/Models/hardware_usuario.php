<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hardware_usuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',	
        'user_id',	
        'hw_descripcion_id',        
    ];
}
