<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'cont_id',
        'fecha',
        'hora',
        'status'
        
    ];
}
