<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hardware;
use Redirect;

class HardwareController extends Controller
{
    public function index()
    {
        return view('configuracion.equipos.index');
    }
    public function store(Request $request)
    {
        $falla = new hardware();
        $falla->descripcion = $request->nombre;
        $falla->save();
        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
}
