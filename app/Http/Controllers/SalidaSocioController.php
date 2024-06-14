<?php

namespace App\Http\Controllers;
use App\Imports\SalidasImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class SalidaSocioController extends Controller
{
  
    public function index(){
        return view('entradas_salidas.socios_salidas.index');
    }
    public function importar(Request $request) 
    {
        $file = $request->file('documento');

        $msg = "";
        Excel::import(new SalidasImport, $file);
                $msg = 'Salidas';
    return redirect()->route('salidas_socios.index')->with('success', $msg.' importados exitosamente');

    }
}
