<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoEmpleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'cont_id',
        'motivo_id',
        'f_vencimiento'
    ];

    
    public function motivo()
    {
        return $this->belongsTo(MotivoEntrada::class, 'motivo_id');
        
    }
}
