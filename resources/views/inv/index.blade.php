@extends('adminlte::page')
 
@section('title', 'AdminLTE')
 
@section('content\_header')
    <h1 class="m-0 text-dark">Inventario</h1>
@stop
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Inventarios</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Inventario || {{Auth::user()->rol->nombre}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  @if (Auth::user()->rol->id == 1)


  <div class="container-fluid">
    <div class="col-12">
        @if($errors->any())
        <x-adminlte-alert class="bg-success text-uppercase" icon="fa fa-lg fa-thumbs-up" title="" dismissable>
                            ¡Registro creado exitosamente!
                        </x-adminlte-alert>
        </div>
        @endif
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$d->total}}</h3>

            <p>Total Equipos</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$d->disponible}}</h3>

            <p>Disponibles</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$d->asignado}}</h3>

            <p>Asignados</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title">Equipos.</h3>
        
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                
               
                <div class="row">
                    
                    <div class="col-4">
                        <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg">
                <x-adminlte-button label="Crear" theme="primary" icon="fa fa-plus"/>                    
            </a>
                    </div>
                    
                    </div>
                    <br>
                <div class="col-12">
                <livewire:inventory-table theme="bootstrap-5" />
                </div>
            </div>
                <!-- Modal mis tickets-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Crear</h5>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('inventario.store') }}">
                        @csrf           sel2Category1                                
                         @section('plugins.Select2', true)
                  <div class="row">
                    <div class="col-4">
{{-- With multiple slots, and plugin config parameter --}}
@php
    $config = [
        "placeholder" => "Seleccione un elemento...",
        "allowClear" => true,
    ];
@endphp
<x-adminlte-select2 id="sel2Category1" name="sel2Category1" 
label="Categoría"
    label-class="text-danger" igroup-size="sm" :config="$config" multiple>
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-yellow">
            <i class="fas fa-tag"></i>
        </div>
    </x-slot>
    <x-slot name="appendSlot">
        
    </x-slot>
    @foreach ($categories as $i)
        <option value="{{$i->id}}">{{$i->descripcion}} </option>
    @endforeach
</x-adminlte-select2>
                  </div>
                    <div class="col-4">
{{-- With multiple slots, and plugin config parameter --}}
@php
    $config = [
        "placeholder" => "Seleccione un elemento...",
        "allowClear" => true,
    ];
@endphp
<x-adminlte-select2 id="sel2Category" name="sel2Category" 
label="Marca"
    label-class="text-danger" igroup-size="sm" :config="$config" multiple>
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-red">
            <i class="fas fa-tag"></i>
        </div>
    </x-slot>
    <x-slot name="appendSlot">
        
    </x-slot>
    @foreach ($marca as $i)
        <option value="{{$i->id}}">{{$i->descripcion}} </option>
    @endforeach
</x-adminlte-select2>
                  </div>
                  <div class="col-4">
                    <label for="modelo" class="form-label">Modelo:</label>
                <BR>
                    <input class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" placeholder="Modelo" name="modelo" id="modelo" type="text" value="{{ old('last_name',$equipo->last_name) }}"  aria-label="Amount"/>                   
                     @if ($errors->has('modelo'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('modelo') }}</strong>
                    </div>
                  @endif
                  </div>
                  <div class="col-4">
                    <label for="descripcion" class="form-label">Descripción:</label>
                <BR>
                    <input class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="Descripción del equipo" name="descripcion" id="descripcion" type="text" value="{{ old('last_name',$equipo->descripcion) }}"  aria-label="Amount"/>                   
                     @if ($errors->has('descripcion'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('descripcion') }}</strong>
                    </div>
                  @endif
                  </div>
                  <div class="col-4">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                <BR>
                    <input class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="Cantidad" name="cantidad" id="cantidad" type="number" value="{{ old('cantidad',$equipo->cantidad) }}"  aria-label="Amount"/>                   
                     @if ($errors->has('cantidad'))
                    <div id="name-error" class="error text-danger pl-3" for="cantidad" style="display: block;">
                      <strong>{{ $errors->first('cantidad') }}</strong>
                    </div>
                  @endif
                  </div>
                  </div>
                  <br>
                  <br>
                  <div class="col-8 text-center">
                    <button type="submit" class="btn btn-info  btn-round"><b>{{ __('Registrar Equipo') }}</b></button>          
                </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        <!--Fin Modal mis tickets -->
            <!-- /.card-body -->
          </div>
    </div>
    
    </div>
    
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Marcas.</h3>
        
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="col-12"> 
                    <x-adminlte-card title="Crear nueva" theme="primary" theme-mode="outline"
                    class="elevation-3" body-class="" header-class=""
                    footer-class="border-top rounded border-light"
                    icon="fa fa-plus-circle" collapsible="collapsed" maximizable>
                    
                    <x-slot name="toolsSlot">
    </x-slot>
    <form class="form" method="POST" action="{{ route('marcas.store') }}">                   
    @csrf
        <x-adminlte-input id="nombre" name="nombre" placeholder="Nombre de la Marca"/>
    
        <div class="text-center">
            <button type="submit" class="btn btn-info  btn-round"><b>{{ __('Crear') }}</b></button>
            
          </div>
    
</form>
</x-adminlte-card>
                </div>
                <livewire:MarcasHw-table theme="bootstrap-5" />
           
              
            </div>
            <!-- /.card-body -->
          </div>
    </div>
        <div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Categorías.</h3>
        
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="col-12"> 
                    <x-adminlte-card title="Crear nueva" theme="primary" theme-mode="outline"
                    class="elevation-3" body-class="" header-class=""
                    footer-class="border-top rounded border-light"
                    icon="fa fa-plus-circle" collapsible="collapsed" maximizable>
                    
                    <x-slot name="toolsSlot">
    </x-slot>
    <form class="form" method="POST" action="{{ route('equipos.store') }}">                   
    @csrf
        <x-adminlte-input id="nombre" name="nombre" placeholder="Tipo de Hardware"/>
    
        <div class="text-center">
            <button type="submit" class="btn btn-info  btn-round"><b>{{ __('Crear') }}</b></button>
            
          </div>
    
</form>
</x-adminlte-card>
                </div>
                <livewire:hardware-table theme="bootstrap-5" />
           
              
            </div>
            <!-- /.card-body -->
          </div>
    </div>
    
    </div>
    
    </div>
  </section>
  @endif
@stop
 