<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratistaController extends Controller
{
    public function index()
    {
        return view('entradas_salidas.contratistas.index');
    }
}
