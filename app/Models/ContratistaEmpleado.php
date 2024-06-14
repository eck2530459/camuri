<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratistaEmpleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'cont_id',
        'emp_id'
    ];

    public function contratista()
    {
        return $this->belongsTo(Contratista::class, 'cont_id');
        
    }
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'emp_id');
        
    }
}
