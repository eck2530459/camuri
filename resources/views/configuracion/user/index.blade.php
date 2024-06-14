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
                <p class="mb-0">Inicio | Usuarios</p>
                <div class="row">
                    <div class="col-10">
                        <h5>Usuarios</h5>
                        <form action="{{route('user.importar')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-6">
                            <input type="file" name="documento" required>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit"> Importar </button>                    
                            </div>
                        </form>
                    </div>

                    @if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2)
                    <div class="col-2">
                        <a href="{{route('user.create') }}">
                <x-adminlte-button label="Crear Usuario" theme="primary" icon="fa fa-file"/>                    
            </a>
                    </div>    
                    @endif
                    
                    </div>
                <br>
                <div class="col-12">
                    <livewire:user-table theme="bootstrap-5"/>
                </div>


            </div>

            
        </div>
        
    </div>
    
   
</div>


@stop