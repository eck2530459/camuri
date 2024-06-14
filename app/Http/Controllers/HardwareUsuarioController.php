<?php

namespace App\Http\Controllers;
use App\Models\hardware_usuario;
use App\Models\Inventario;
use App\Models\HistorialInventario;
use Redirect;
use Auth;


use Illuminate\Http\Request;

class HardwareUsuarioController extends Controller
{
   
    
    public function store(Request $request)
    {
        $inv =  Inventario::find($request->hw_id);
        $cantinicial = $inv->cantidad;
        $cantfinal = $cantinicial - 1;
        $hwu = hardware_usuario::where('hw_descripcion_id',$request->hw_id)        
        ->where('user_id',$request->contactId)->get();
        $msg = '';
       
        if ($hwu->isempty()) {
            if ($cantfinal == 0) {
                $inv->update([
                    'status' => 'Agotado']
                );
            }    
            $inv->update([
                'cantidad' => $cantfinal]
            );
    
          
            $hwu = new hardware_usuario();
            $hwu->status = 'Activo';
            $hwu->user_id = $request->contactId;
            $hwu->serial = $request->serial;
            $hwu->hw_descripcion_id = $request->hw_id;
            $hwu->save();

            $historial = new HistorialInventario();
            $historial->hw_id = $request->hw_id;
          // $historial->marca_id = $request->sel2Category;
            $historial->razon_status = 'Asignación del Producto';
            $historial->cantidad = $cantfinal;
            $historial->creado_por = Auth::user()->id;
            $historial->serial = $request->serial;
            $historial->user_id = $request->contactId;
            $historial->save();    
            return Redirect::back()->withErrors(['msg' => 'Equipo asignado correctamente']);
        }
        //return $hwu;
        elseif ($hwu[0]->user_id == $request->contactId 
        && $hwu[0]->hw_descripcion_id == $request->hw_id && $hwu[0]->serial == $request->serial) 
       // if ($hwu->isnotempty()) 
        {
            return Redirect::back()->withErrors(['msg' => 'Ya existe un registro similar']);
        }

        else{
            if ($cantfinal == 0) {
                $inv->update([
                    'status' => 'Agotado']
                );
            }    
            $inv->update([
                'cantidad' => $cantfinal]
            );              
            $hwu = new hardware_usuario();
            $hwu->status = 'Activo';
            $hwu->user_id = $request->contactId;
            $hwu->serial = $request->serial;
            $hwu->hw_descripcion_id = $request->hw_id;
            $hwu->save();
            
           
    
            return Redirect::back()->withErrors(['msg' => 'Equipo asignado']);
        }
       
    }
    public function update(Request $request)
    {
       
        $inv =  Inventario::find($request->hw_id);
        $inv->update([
            'status' => 'Disponible',
            'cantidad' => $request->asig]
        );
        /*$hwu = new hardware_usuario();
        $hwu->status = 'Inactivo';
        $hwu->user_id = $request->contactId;
        $hwu->hw_descripcion_id = $request->hw_id;
        $hwu->save();*/
        return Redirect::back()->withErrors(['msg' => 'The Message']);
    }
}
