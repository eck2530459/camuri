@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">Inicio | Crear Empleado</p>
                <div class="row">
                <div class="col-12">
                    <a href="{{ url('/empleados') }}">
                        <x-adminlte-button label="Volver" theme="primary" icon="fa fa-arrow-back"/>                    
                    </a>
                </div>
                </div>
              
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('empleados.store') }}">
                    @csrf
                    <div class="row">
                   
                    <div class="col-6">

                        <x-adminlte-input name="cedula" id="cedula" label="Cédula" type="number" >
                            <x-slot name="prependSlot">
                                <div class="input-group-text text-purple">
                                    <i class="fas fa-address-card"></i>
                                </div>
                                <select name="nacionalidad" id="nacionalidad">
                                    <option value="V">V</option>
                                    <option value="E">E</option>
                                    <option value="J">J</option>
                                    <option value="P">P</option>
                                </select>
                            </x-slot>
                            <x-slot name="bottomSlot">
                                <span class="text-sm text-gray">
                                    No utilice puntos.
                                </span>
                            </x-slot>
                        </x-adminlte-input>
                </div>
                <div class="col-6">
                    <livewire:empleadomotivo /> 

                </div>
              
                <div class="col-6">
                    <x-adminlte-input name="nombres" label="Nombres" placeholder="Nombres" label-class="text-gray">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>
                <div class="col-6">
                    <x-adminlte-input name="apellidos" label="Apellidos" placeholder="Apellidos" label-class="text-gray">
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-user text-lightblue"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>

                <div class="col-6">
                    <label for="startDate">Fecha vencimiento contrato</label>
                    <input id="startDate" name="startDate" class="form-control" type="date" />        
                 </div>
                  
                <div class="col-6">
                    <label for="">Contratista</label>
                    <livewire:searchablecontratista /> 
                                    </div>
                                
                                <div class="form-group">
                                  
                              </div>
                              <div class="col-6 text-center">
                                <button type="submit" class="btn btn-info  btn-round"><b>{{ __('Crear Ticket') }}</b></button>
                                
                              </div>
                </div>
            </form>
            
        </div>
    </div>
    </div>
</div>

@stop