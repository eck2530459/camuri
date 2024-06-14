<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketDetalle extends Model
{
    protected $fillable = [
        'analista_id',
        'respuesta',
    ];
    static $rules_update = [
        'analista_id' => 'required'        
        ];
    use HasFactory;
    public function user_detalle()
    {
        return $this->belongsTo(User::class, 'user_id');
        
    }
    public function asunto_detalle()
    {
        return $this->belongsTo(Asunto::class, 'asunto_id'); 
    }
    public function ticket_detalle()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id'); 
    }
    
   
    
}
