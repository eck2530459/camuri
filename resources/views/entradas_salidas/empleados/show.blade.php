@extends('adminlte::page')
@section('title', 'Entradas - Salidas')
@section('content')
<br>
<div class="row">
    <div class="col-12">
    <div class="card">
        <div class="card-header card-header-primary">            
            <h4 class="card-title "><b>{{ $empleadomotivo[0]->motivo->descripcion }}  </b></h4>
                    </div>
        <div class="card-header card-header-primary">            
<h4 class="card-title "><b>Empleado #{{$empleado->id}} Status: {{$empleado->status}}  </b></h4>
        </div>
      
<div class="row">
            <div class="col-2 text-center">
                        <h1 class="card-title">                 
                        <small class="text-muted">
                            <b>Datos del Empleado: </b>
                        </small></h1>
                  
    </div>
    <br>
            <div class="col-5">
                     
                        <div class="form-group">
                            <strong><b>Status del empleado:&nbsp;</b></strong>
                            {{ $empleado->status }}
                        </div>
                        <div class="form-group">
                            <strong><b>Nombres del empleado:&nbsp;</b></strong>
                            {{ $empleado->nombres }}  {{$empleado->apellidos}}
                        </div>
                        <div class="form-group">
                            <strong><b>Cédula del empleado:&nbsp;</b></strong>
                            {{ $empleado->cedula }}
                        </div>         
                               
    </div>
    <br>
    
    <div class="col-5 text-center">
        <div class="form-group">
            <strong><b>Motivo de Entrada - Salida:&nbsp;</b></strong>
            {{ $empleadomotivo[0]->motivo->descripcion }}
        </div> 
        <div class="form-group">
            <strong><b>Vencimiento de contrato:&nbsp;</b></strong>
            {{ \Carbon\Carbon::parse($empleadomotivo[0]->f_vencimiento)->format('d-m-Y') }}
            
        </div> 
        <div class="form-group">
            Codigo QR:
            <br>
             {!!QrCode::generate('http://localhost:8000/empleados'.$empleado->id); !!}    
         </div>
         @if ($empleado->status == 'Activo' && $mm == false )
         <div class="row">
            
            @if ($me == true)
            <div class="col-6">
                <div class="form-group">
                   <form class="form" method="POST" action="{{ route('entradas.store') }}">
                       @csrf
                       <input type="hidden" name="hemp_id" id="hemp_id" value="{{$empleado->id}}">
                       <button type="submit" class="btn btn-success  btn-round"><b>{{ __('Marcar Entrada') }}</b></button>
                   </form>
                </div>
                   </div>
                   @else
                   <div class="col-6">
                    <div class="form-group">
                        @if ($ventradas != null)
                        <label for="entrada"> Entrada: {{$ventradas->fecha}}</label>
                        <label for="entrada"> Hora: {{$ventradas->hora}}</label>
                        <label for="entrada"> Hora: {{$ventradas->id}}</label>
                    </div>
                </div>
                        
 <div class="col-6">
         <div class="form-group">
            <form class="form" method="POST" action="{{ route('entradas.update', $ventradas->id) }}">
                @method('PUT')
                @csrf
                <input type="hidden" name="hemp_id" id="hemp_id" value="{{$ventradas->id}}">                
                <button type="submit" class="btn btn-danger  btn-round"><b>{{ __('Marcar Salida') }}</b></button>
            </form>
         </div>
        </div>


                        @endif
                    
                    
            
                   @endif
        
         </div>
         @endif
    </div>
</div>
@if ($empleado->status == 'Activo')
    
<div class="row">
            <div class="col-2 text-center">
                        <h1 class="card-title">                 
                        <small class="text-muted">
                            <b>Datos del Contratista: </b>
                        </small></h1>
                        <div class="form-group">
                           <br>
                        </div>
    </div>
            <div class="col-6">
                       
                <div class="form-group">
                    <strong><b>Status del contratista:&nbsp;</b></strong>
                    {{ $empleadocontratista[0]->contratista->status }}
                </div>
                <div class="form-group">
                    <strong><b>Razón Social:&nbsp;</b></strong>
                    {{ $empleadocontratista[0]->contratista->razon_social }}
                </div>
                <div class="form-group">
                    <strong><b>Rif o cédula:&nbsp;</b></strong>
                    {{ $empleadocontratista[0]->contratista->rif_cedula }}
                </div>
                <div class="form-group">
                    <strong><b>Nombres Encargado:&nbsp;</b></strong>
                    {{ $empleadocontratista[0]->contratista->nombres }} {{ $empleadocontratista[0]->contratista->apellidos }}
                </div>
                
                  
    </div>
</div>


@endif

</div>
</div>
</div>

@stop