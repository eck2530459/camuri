<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialTicket extends Model
{
    use HasFactory;
    public function asunto_detalle()
    {
        return $this->belongsTo(Asunto::class, 'asunto'); 
    }
    public function ticket_detalle()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id'); 
    }
    public function user_detalle()
    {
        return $this->belongsTo(User::class, 'user_id');
        
    }
}
