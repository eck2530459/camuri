<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use Redirect;



class DepartamentoController extends Controller
{
    public function index()
    {
        return view('configuracion.departamentos.index');
    }
    public function create()
    {
        return view('configuracion.departamentos.create');
    }
    public function store(Request $request)
    {
        $falla = new Departamento();
        $falla->nombre = $request->nombre;
        $falla->save();
        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
    public function edit($id)
    {
        $t = Departamento::find($id);
      
        //$ticketdetalle = TicketDetalle::where('ticket_id', $id)->get();
        
        
        if ($t == NULL)
        {
            return redirect()->route('departamentos.index');
        }


        return view('configuracion.departamentos.edit', compact('t'));
    }
    public function update(Request $request)
    {
        $t = Departamento::find($request->id);
        //request()->validate(TicketDetalle::$rules_update);
        $t->update([
            'nombre' => $request->input('nombre', $t->nombre)
            
        ]);
         return back()->withStatus(__(' con éxito.'));
    }
}
