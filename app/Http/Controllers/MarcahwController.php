<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marcahw;
use Redirect;


class MarcahwController extends Controller
{
    public function index()
    {
        return view('configuracion.marcas.index');
    }
    public function store(Request $request)
    {
        $falla = new Marcahw();
        $falla->descripcion = $request->nombre;
        $falla->save();
        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
}
