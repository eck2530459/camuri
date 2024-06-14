<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hardware;
use App\Models\Marcahw;
use App\Models\Inventario;
use App\Models\hardware_usuario;
use App\Models\HistorialInventario;
use Redirect;
use Auth;


class InventarioController extends Controller
{
   public function index(){
    $d = Inventario::selectRaw('COUNT(*) as total,
    SUM(status="Asignado") as asignado,
    SUM(status="Disponible") as disponible')
    ->first();   
    $añoactual = now();
    $year= $añoactual->year; 
    $categories = hardware::all();
    $marca = Marcahw::all();
    $equipo = new Inventario();

    return view('inv.index', compact('year', 'categories', 'marca', 'equipo', 'd'));

   }
   public function store(Request $request)
   {    
       $equipo = new Inventario();
       $equipo->marca_id = $request->sel2Category;
       $equipo->hw_id = $request->sel2Category1;
       $equipo->modelo = $request->modelo;
       $equipo->status = 'Disponible';
       $equipo->descripcion = $request->descripcion;
       $equipo->cantidad = $request->cantidad;
       $equipo->save();
       $data2 = Inventario::latest()->first()->id;
        //return $data2;
        $historial = new HistorialInventario();
        $historial->hw_id = $data2;
      // $historial->marca_id = $request->sel2Category;
        $historial->razon_status = 'Creación Inicial del Producto';
        $historial->cantidad = $request->cantidad;
        $historial->creado_por = Auth::user()->id;
        $historial->save();

        //$historial = 


       return Redirect::back()->withErrors(['msg' => 'The Message']);
   }
   public function edit($id)
   {
    $cantinventario = hardware_usuario::where('user_id', '!=', NULL)
    ->where('status', 'Activo')
    ->where('hw_descripcion_id', $id)->count();    
    $inventario = Inventario::find($id);
    $cantfinalinventario = $inventario->cantidad;

    $userinv = hardware_usuario::join('inventarios', 'inventarios.id', 'hardware_usuarios.hw_descripcion_id')
    ->join('users', 'users.id', 'hardware_usuarios.user_id')
    ->join('departamentos as d', 'd.id', 'users.departamento_id')    
    ->where('hardware_usuarios.hw_descripcion_id', $id)
    ->select('hardware_usuarios.id','hardware_usuarios.serial','users.id as uid','users.name', 'users.last_name', 'd.nombre', 'hardware_usuarios.status', 'hardware_usuarios.hw_descripcion_id')->get();
    //return $userinv;
   $last_user = $userinv->last();
    
  
    if ($inventario == NULL)
    {
        return redirect()->route('inv.index');
    }


    return view('inv.edit', compact('inventario', 'userinv', 'last_user', 'cantinventario', 'cantfinalinventario'));
   }
   public function update(Request $request){
    //return $request;
    $inv = Inventario::find($request->hw_id);
    $hwu = hardware_usuario::find($request->id);
    $cantinicial = $inv->cantidad;
   
    $cantfinal = $cantinicial + 1;
        
    $inv->update([
        'cantidad' => $cantfinal]
    );
    $hwu->update([
        'status' => 'Inactivo',
        'user_id' => NULL,
        ]
    );
    $historial = new HistorialInventario();
    $historial->hw_id = $request->hw_id;
  // $historial->marca_id = $request->sel2Category;
    $historial->razon_status = 'Eliminación del producto';
    $historial->cantidad = $cantfinal;
    $historial->creado_por = Auth::user()->id;
    $historial->user_id = $request->user_id;
   $historial->serial = $request->serial;
    $historial->save();    

    //return $hwu;
    return back()->withStatus(__('Analista asignado con éxito.'));

   }
}
