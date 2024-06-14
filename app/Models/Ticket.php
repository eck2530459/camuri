<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'status'
    ];

    public function ticket_detalle()
    {
        return $this->belongsTo(TicketDetalle::class, 'id');
        
    }
    public function asunto_detalle()
    {
        return $this->belongsTo(Asunto::class, 'asunto_id');
        
    }
    public function user_detalle()
    {
        return $this->belongsTo(User::class, 'id');
        
    }
}
