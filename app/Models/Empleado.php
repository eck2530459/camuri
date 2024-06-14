<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'qr_code',
        'status'
    ];

    public function empleado_contratista()
    {
        return $this->belongsTo(Contratista::class, 'id');
        
    }
}
