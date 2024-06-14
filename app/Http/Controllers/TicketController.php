<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketDetalle;
use App\Models\HistorialTicket;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets');
    }
    public function show()
    {
        return view('tickets');
    }

    public function destroy($id)
    {
        //$ticket = Ticket::find($id);
        $HistorialTicket = new HistorialTicket();
            $HistorialTicket->razon_estatus = 'Eliminación de Ticket';
            $HistorialTicket->user_id = Auth::user()->id;
            //$HistorialTicket->asunto = $id->categoria;
            //$HistorialTicket->descripcion = $id->descripcion;
            $HistorialTicket->respuesta = '';
            $HistorialTicket->ticket_id = $id;
            $HistorialTicket->save();

        $ticket2 = TicketDetalle::find($id)->delete();
        $ticket = Ticket::find($id)->delete();

        return view('tickets');
    }
}
