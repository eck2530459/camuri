<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entradas;
use Carbon\Carbon;


class EntradasController extends Controller
{
    public function store(Request $request)
    {

        $fecha_actual = Carbon::now()->format('d-m-y');
        $hora_actual = Carbon::now()->format('h:i:s');
        //$date->toTimeString();
        $falla = new Entradas();
        $falla->emp_id = $request->hemp_id;
        $falla->status = 0;
        $falla->fecha = $fecha_actual;
        $falla->hora = $hora_actual;
        //return $falla;
        $falla->save();
        
        return view('entradas_salidas.empleados.index');
    }
    public function update(Request $request)
    {
        $fecha_actual = Carbon::now()->format('d-m-y');
        $hora_actual = Carbon::now()->format('h:i:s');
        $modentrada = Entradas::find($request->hemp_id);
        $modentrada->update($request->all());
        $modentrada->status= 2;  
        $modentrada->update(["status" => 2]);
        $resultado = $modentrada->save();
        
        //return $modentrada->emp_id;
       $falla = new Entradas();
       $falla->emp_id = $modentrada->emp_id;
       $falla->status = 1;
       $falla->fecha = $fecha_actual;
       $falla->hora = $hora_actual;
       //return $falla;
       $falla->save();
        
        return view('entradas_salidas.empleados.index');
    }
}
