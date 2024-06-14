<?php

namespace App\Http\Controllers;
use App\Models\Contratista;
use App\Models\ContratistaEmpleado;
use App\Models\Empleado;
use App\Models\MotivoEmpleado;
use App\Models\Entradas;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;



use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('entradas_salidas.empleados.index');
    }
    public function create()
    {
        return view('entradas_salidas.empleados.create');
    }
    public function store(Request $request)
    { 
        $qr = QrCode::size(250)->generate('http://localhost/8000/empleados/'. $request->id);
        
        $empleado = new Empleado();       
        $empleado->cedula = $request->nacionalidad.$request->cedula;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->status = 'Activo';
        $empleado->qr_code = $qr;
        $empleado->save();

        $data = Empleado::latest()->first()->id;

        $empleadocontratista = new ContratistaEmpleado();
        $empleadocontratista->emp_id = $data;
        $empleadocontratista->cont_id = $request->contratista_id;
        $empleadocontratista->qr_code = $qr;
        $empleadocontratista->save();

        //$fecha_convertida = $request->startDate;

        $empleadomotivo = new MotivoEmpleado();
        $empleadomotivo->emp_id = $data;
        $empleadomotivo->f_vencimiento = $request->startDate;
        $empleadomotivo->motivo_id = $request->motivo_id;
        $empleadomotivo->save();

        //return $empleadocontratista;
        
        return view('entradas_salidas.empleados.index');
    }
    public function show($id)
    { 
        //inicio comparando fecha actual con fecha de vencimiento de contrato del empleado
        $fecha_actual = Carbon::now();
        $f_ven = MotivoEmpleado::select('f_vencimiento')->where('emp_id', '=', $id)->get();
        $fv = Carbon::parse($f_ven[0]->f_vencimiento);
        $mm = false;
        $me = false;
        $empleadoentradas ='';

        if ($fecha_actual->gte($fv)) {
            $mm = true;
        }
        //fin. Si la fecha actual es mayor a la del contrato me devuele la variable en true

        $ventradas = Entradas::where('emp_id', '=', $id)
        ->where('status', '=', '0')->orderby('created_at', 'ASC')->first();
        if ($ventradas == NULL) {
            $me = true;
            $empleadoentradas = Entradas::where('emp_id', '=', $id)->where('status','=', '0')->get();
        }

        
        $empleado = Empleado::find($id);
        $empleadocontratista = ContratistaEmpleado::where('emp_id', '=', $id)->get();
        
        $empleadomotivo = MotivoEmpleado::where('emp_id', '=', $id)->get();
    //return $ventradas;
        
        return view('entradas_salidas.empleados.show', compact('empleado', 'ventradas', 'me','mm','fecha_actual', 'empleadoentradas', 'empleadocontratista', 'empleadomotivo'));
    }
}
