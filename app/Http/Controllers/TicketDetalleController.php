<?php

namespace App\Http\Controllers;
use App\Models\TicketDetalle;
use App\Models\HistorialTicket;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Asunto;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class TicketDetalleController extends Controller
{
    public function index()
    {
       
        return view('tickets.index');
    }
    public function create()
    {
       
        $TicketDetalles = new TicketDetalle();
      
        return view('tickets.create', compact('TicketDetalles'));
    }


    public function store(Request $request)
    {
        $Tickets = new Ticket();
        $Tickets->fecha = now();
        $Tickets->status = $request->status;
        $Tickets->save();

        $TicketDetalles = new TicketDetalle();
        $TicketDetalles->asunto_id = $request->categoria;
        $TicketDetalles->descripcion = $request->descripcion;
        $TicketDetalles->user_id = $request->user_id;
        $data = Ticket::latest()->first()->id;
        $TicketDetalles->ticket_id = $data;
        $resul= $TicketDetalles->save(); 

        $HistorialTicket = new HistorialTicket();
        $asunto = Asunto:: find($request->categoria);
        $HistorialTicket->razon_estatus = 'Creación inicial de Ticket';
        $usuario = User::find($request->user_id);
        $HistorialTicket->user_id = $usuario->name . ' '. $usuario->last_name;
        $HistorialTicket->asunto = $asunto->nombre;
        $HistorialTicket->mod_id = Auth::user()->id;
        $HistorialTicket->descripcion = $request->descripcion;
        $HistorialTicket->respuesta = '';
        $HistorialTicket->analista_id = '';
        $data2 = Ticket::latest()->first()->id;
        $HistorialTicket->ticket_id = $data2;
        $HistorialTicket->save();
  
        return view('tickets', compact('TicketDetalles'));
    }
   /* public function update(Request $request, TicketDetalle $ticketdetalle)
    {
        $ticketdetalle = TicketDetalle::find($request->id);
        request()->validate(TicketDetalle::$rules_update);
        $ticketdetalle->analista_id = $request->analista_id;
        $ticketdetalle->update($request->all());
      
        return redirect()->route('ticket.index')
            ->with('success', 'Analista actualizado con éxito.');
    }*/
   

    public function edit($id)
    {
        $mtu3 = HistorialTicket::where('ticket_id', $id)->get();
        //return $mtu3;
        $ticket = TicketDetalle::find($id);
        $t = Ticket::find($id);
        $ticketdetalle = TicketDetalle::where('ticket_id', $id)->get();
        
        $analista =  DB::table('users')
        ->join('ticket_detalles', 'ticket_detalles.analista_id', '=', 'users.id')
        ->where('ticket_detalles.id',  $id)
        ->get();


        /*$merMercados = DB::table('mer_mercados')
        ->join('mer_concesionarios', 'mer_mercados.id', '=', 'mer_concesionarios.mercado_id')
        ->where('mer_contrato_id', '!=', NULL)
        ->select('mer_mercados.id')
        ->groupBy('mer_mercados.id')
         ->get();
*/
        if ($ticket == NULL)
        {
            return redirect()->route('tickets.index');
        }


        return view('tickets.edit', compact('ticket', 'mtu3', 'ticketdetalle', 't', 'analista'));
    
    }
    public function update(Request $request)
    {
        $ticket = TicketDetalle::find($request->id);
        $ticket2 = Ticket::find($request->id);
        //return $ticket->analista_id; 
        //request()->validate(TicketDetalle::$rules_update);
       
        //return $fechapro;
        if ($ticket->analista_id == NULL || $ticket->analista_id == '') {
            $historial = HistorialTicket::where('ticket_id', $request->id)->first();   
            $Ha = $request->input('categoria', $ticket->analista_id);  
            $analista = User::find($Ha);         
            //return 'Hal alguien hay con vida';
            $HistorialTicket = new HistorialTicket();
            $HistorialTicket->razon_estatus = 'Asignación de Analista';
            $HistorialTicket->user_id = $historial->user_id;
            $HistorialTicket->asunto = $historial->asunto;
            $HistorialTicket->descripcion = $ticket->descripcion;
            $HistorialTicket->mod_id = Auth::user()->id;
            $HistorialTicket->respuesta = $ticket->respuesta;
            $HistorialTicket->analista_id = $analista->name . ' '. $analista->last_name;
            $HistorialTicket->ticket_id = $request->id;
            $HistorialTicket->save();    
            $ticket2->fecha = now();
            $fechapro = $ticket2->fecha;
            $ticket2->update([
                'fecha' => $fechapro]
            );

           
        } elseif ($ticket->respuesta == NULL || $ticket->respuesta == '') {
            $analista = User::find($ticket->analista_id);
             $ticket2->fecha_rpta = now();
            //return  $analista;
            //return $request->input('respuesta', $ticket->respuesta);
            $historial = HistorialTicket::where('ticket_id', $request->id)->first();
            $HistorialTicket = new HistorialTicket();
            $HistorialTicket->razon_estatus = 'Respuesta de Analista';
            $HistorialTicket->user_id = $historial->user_id;
            $HistorialTicket->mod_id = Auth::user()->id;
            $HistorialTicket->asunto = $historial->asunto;
            $HistorialTicket->descripcion = $ticket->descripcion;
            $HistorialTicket->respuesta = $request->input('respuesta', $HistorialTicket->respuesta);
            $HistorialTicket->analista_id = $analista->name . ' '. $analista->last_name;
            $HistorialTicket->ticket_id = $request->id;    
            $HistorialTicket->save();
            
           
        }        
        $ticket->update([
            'analista_id' => $request->input('categoria', $ticket->analista_id), 
            'respuesta' => $request->input('respuesta', $ticket->respuesta), 
        ]);
        $ticket2->update([
            'status'  => 'Asignado']
        );
           
       // return view('tickets.edit', $id, compact('mtu3'));


  return back()->withStatus(__('Analista asignado con éxito.'));

       
    }
    public function analista(Request $request)
    {
       
        $ticketanalista = TicketDetalle::find($request->id);
        $ticketanalista2 = Ticket::find($request->id);
        //request()->validate(TicketDetalle::$rules_update);
        $ticketanalista->update([
            'analista_id'  => '']);
      
            return back()->withStatus(__('Analista eliminado con éxito.'));    
        }
   

    public function show($id)
    {
       $ticket = Ticket::find($id);
       $ticketdetalle = TicketDetalle::where('ticket_id', $id)->get();
      
        return view('tickets.show', compact('ticket', 'ticketdetalle'));
    }
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->status= 'Abierto';
        $ticket->save();       
        $ticketanalista = TicketDetalle::find($id);       
        
            $HistorialTicket = new HistorialTicket();
            $HistorialTicket->razon_estatus = 'Eliminación de Analista';
            $HistorialTicket->user_id = Auth::user()->id;
            $HistorialTicket->asunto = $ticketanalista->asunto_id;
            $HistorialTicket->descripcion = $ticketanalista->descripcion;
            $HistorialTicket->mod_id = Auth::user()->id;
            //$HistorialTicket->respuesta = $ticketanalista->respuesta;
            $HistorialTicket->ticket_id = $id;
            $HistorialTicket->save();
     
            $ticketanalista->update([
                'analista_id'  => NULL,
                'respuesta' => NULL]);

        return back()->withStatus(__('Analista eliminado con éxito.'));
    }
}
