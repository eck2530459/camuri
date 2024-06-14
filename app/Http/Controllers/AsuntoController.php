<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asunto;
use Redirect;


class AsuntoController extends Controller
{
    public function index()
    {
        return view('configuracion.asuntos.index');
    }
    public function create()
    {
        return view('configuracion.asuntos.create');
    }
    public function store(Request $request)
    {
        $falla = new Asunto();
        $falla->nombre = $request->nombre;
        $falla->save();
        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
    public function edit($id)
    {
        $t = Asunto::find($id);
      
        //$ticketdetalle = TicketDetalle::where('ticket_id', $id)->get();
        
        
        if ($t == NULL)
        {
            return redirect()->route('fallas.index');
        }


        return view('configuracion.asuntos.edit', compact('t'));
    }

    public function update(Request $request)
    {
        $t = Asunto::find($request->id);
        //request()->validate(TicketDetalle::$rules_update);
        $t->update([
            'nombre' => $request->input('nombre', $t->nombre)
            
        ]);
         return back()->withStatus(__('Editado asignado con éxito.'));

       
    }
 
}
