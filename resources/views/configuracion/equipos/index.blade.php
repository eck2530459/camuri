@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="col-12">
        @if($errors->any())
        <x-adminlte-alert class="bg-success text-uppercase" icon="fa fa-lg fa-thumbs-up" title="" dismissable>
                            ¡Registro creado exitosamente!
                        </x-adminlte-alert>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <p class="mb-0">Inicio | Categoría Equipo</p>
                <div class="row">
                <div class="col-6">
                    <h5>Equipo</h5>
                </div>
        
                <div class="col-6"> 
                    <x-adminlte-card title="Crear nueva" theme="primary" theme-mode="outline"
                    class="elevation-3" body-class="" header-class=""
                    footer-class="border-top rounded border-light"
                    icon="fa fa-plus-circle" collapsible="collapsed" maximizable>
                    
                    <x-slot name="toolsSlot">
    </x-slot>
    <form class="form" method="POST" action="{{ route('marcas.store') }}">                   
    @csrf
        <x-adminlte-input id="nombre" name="nombre" placeholder="Descripcion de la falla"/>
    
        <div class="text-center">
            <button type="submit" class="btn btn-info  btn-round"><b>{{ __('Crear Registro') }}</b></button>
            
          </div>
    
</form>
</x-adminlte-card>
                </div>
                </div>
                <br>
                <div class="col-12">
                    <livewire:equipos-table theme="bootstrap-5"/>
                </div>


            </div>

            
        </div>
        
    </div>
    
   
</div>

@stop