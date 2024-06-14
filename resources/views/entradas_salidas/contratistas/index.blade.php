@extends('adminlte::page')
@section('title', 'Entradas - Salidas')
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
                <p class="mb-0">Inicio | Contratistas</p>
                <div class="row">
                <div class="col-10">
                    <h5>Todos</h5>
                </div>
                <div class="col-2">
                    <a href="{{route('contratistas.create') }}">
            <x-adminlte-button label="Crear Nuevo" theme="primary" icon="fa fa-file"/>                    
        </a>
                </div>
                </div>
                <br>
                <div class="col-12">
                    <livewire:contratista-table theme="bootstrap-5"/>
                </div>


            </div>

            
        </div>
        
    </div>
    
   
</div>



@stop