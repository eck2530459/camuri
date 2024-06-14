<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelo',	
        'descripcion',	
        'serial	',
        'marca_id',	
        'hw_id',
        'cantidad',
        'status'
    ];
    public function hardware_detalle()
    {
        return $this->belongsTo(hardware::class, 'hw_id'); 
    }
    public function marca_detalle()
    {
        return $this->belongsTo(Marcahw::class, 'marca_id'); 
    }

}
