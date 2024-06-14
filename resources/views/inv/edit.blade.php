@extends('adminlte::page')
 
@section('title', 'Equipos')
 
@section('content\_header')
    <h1 class="m-0 text-dark">Inventario</h1>
@stop

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
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

  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-dark">
          <div class="inner">
            <h3>{{$cantinventario + $cantfinalinventario}}</h3>

            <p>Inventario</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$cantfinalinventario}}<sup style="font-size: 20px"></sup></h3>

            <p>Disponibles</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>          
          <h4 class="small-box-footer">%</h4>          
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$cantinventario}}</h3>

            <p>Asignados</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <h4 class="small-box-footer">2 %</h4>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>s</h3>

            <p>Tickets culminados</p>
          </div>
          <div class="icon">
            <i class="fas fa-arrow-circle-right"></i>
          </div>
          <h4 class="small-box-footer">s %</h4>
        </div>
      </div>
    </div>
      <!-- ./col -->
    </div>

<div class="row">
    <div class="col-6">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Equipo.</h3>
            
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Inventario |  Equipo</p>
                    <div class="row">
                    <div class="col-10">
                        <h5>Actualizar Equipo</h5>
                    </div>
                    <div class="col-2">
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-6">
                        <br>
                            <div class="form-group">
                                <strong>Categoría:&nbsp;</strong>
                                <select class="form-control " data-style="btn btn-link"  id="descripcion" name="categoria" wire:model="categoria"> 
                                    <option value="{{$inventario->hardware_detalle->id}}">{{$inventario->hardware_detalle->descripcion}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Modelo:&nbsp;</strong>
                                <input class="form-control" name="modelo" id="modelo" type="text" value="{{$inventario->modelo}}" disabled aria-required="true"/>  
                            </div>
                            <div class="form-group">
                                <strong>Descripción:&nbsp;</strong>
                                <input class="form-control" name="modelo" id="modelo" type="text" value="{{$inventario->descripcion}}" disabled aria-required="true"/>  
                            </div>
                    </div>
                    <div class="col-6">
                        <br>
                        <div class="form-group">
                            <strong>Marca:&nbsp;</strong>
                            <select class="form-control " data-style="btn btn-link"  id="descripcion" name="categoria" wire:model="categoria"> 
                                <option value="{{$inventario->marca_detalle->id}}">{{$inventario->marca_detalle->descripcion}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Cantidad disponible:&nbsp;</strong>
                            <input class="form-control" name="cantidad" id="cantidad" type="text" value="{{$inventario->cantidad}}" disabled aria-required="true"/>  
                        </div>
                        <div class="form-group">
                            <strong>Estatus:&nbsp;</strong>
                            <input class="form-control" name="modelo" id="modelo" type="text" value="{{$inventario->status}}" disabled aria-required="true"/>  
                        </div>
                    </div>
                    <div class="col-12">
                        
                        <div class="box-footer mt20 text-center">
                            <button type="submit" class="btn btn-primary"><b>Actualizar</b></button>
                            </div> 
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        
        </div>
        
        </div>
      </section>
    </div>
    <div class="col-6">
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Asignar Equipo.</h3>
            
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
                        <div class="col-12">
                            @if ($inventario->cantidad <= 0)
                            <form class="form" method="POST" action="{{ route('asignar_equipo.update',  $inventario->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card">
                                    <div class="card-body">
                                        <p class="mb-0">Inventario |  Equipo</p>
                                        <div class="row">
                                        <div class="col-10">
                                            <h5>No quedan equipos disponibles {{$inventario->status}}</h5>
                                        </div>
                                        <div class="col-2">
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="asig" class="form-label">Agregar más equipos:</label>
                                            <BR>
                                                <input class="form-control{{ $errors->has('asig') ? ' is-invalid' : '' }}" placeholder="Agregar más productos al inventario" name="asig" id="asig" type="text"  aria-label="Amount"/>                                                    @if ($errors->has('descripcion'))
                                                <div id="name-error" class="error text-danger pl-3" for="asig" style="display: block;">
                                                  <strong>{{ $errors->first('asig') }}</strong>
                                                </div>
                                              @endif
                                              </div>
                                       
                                    
                                        <div class="col-12">
                                            <input type="hidden" id="hw_id" name="hw_id" value="{{ $inventario->id}}" > 
                                            <input type="hidden" id="contactId" name="contactId" value="{{ $last_user->id}}" > 
                    
                                            <div class="box-footer mt20 text-center">
                                                <button type="submit" class="btn btn-warning"><b>Agregar Equipo(s)</b></button>
                                                </div> 
                                        </div>
                                        
                                        </div>
                    
                                    </div>
                                </div>
                            </form>
                            @else
                        <form class="form" method="POST" action="{{ route('asignar_equipo.store') }}">
                            @csrf
                            <div class="card">
                                <div class="col-12">
                                    @if($errors->any())

                                    <x-adminlte-alert class="bg-dark text-uppercase"  title="" dismissable>
                                        {{$errors->first()}}
                                                    </x-adminlte-alert>
                                                    @endif
                                    </div>
                                    
                                <div class="card-body">
                                    <p class="mb-0">Inventario |  Equipo</p>
                                    <div class="row">
                                    <div class="col-10">
                                        <h5>Asignar Equipo</h5>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                         
                                                <div class="form-group">
                                                    <label for="serial">Serial del equipo:</label>     
                                   <input class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" placeholder="Serial del equipo" name="serial" id="serial" type="text" required minlength="3"  aria-label="Amount"/>
                    
                                        </div>
                                        </div>
                                       
                                    <div class="col-12">
                                        <label for="serial">Equipo:</label>     
                
                                            <livewire:select-component>   
                                    </div>
                                
                                
                                    <div class="col-12">
                                        <input type="hidden" id="hw_id" name="hw_id" value="{{ $inventario->id}}" > 
                
                                        <div class="box-footer mt20 text-center">
                                            <button type="submit" class="btn btn-success"><b>Asignar</b></button>
                                            </div> 
                                    </div>
                                    
                                    </div>
                
                                </div>
                            </div>
                        </form>
                        @endif
                        </div>
                    </div>
   
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        
        </div>
        
        </div>
      </section>
    </div>
    <!-- <section class="content"> 
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Equipos asignados.</h3>
            
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-0">Inventario |  Equipo</p>
                                    <div class="row">
                                    <div class="col-10">
                                        <h5>Equipos asignados</h5>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    </div>
                                    <div class="row">
                                   
                                  
                                    <div class="col-12">
                                        
                                        <table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Serial</th>
                                                    <th>Departamento</th>
                                                    <th>Usuario</th>
                                                    <th>Status</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userinv as $user )
                                                    
                                               
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->serial}}</td>
                                                    <td>{{$user->nombre}}</td>
                                                    <td>{{$user->name}} {{$user->last_name}}</td>
                                                    <td>{{$user->status}}</td>
                                                    <td>
                                                        <form method="POST" action="{{ route('inventario.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" id="id" name="id" value="{{ $user->id}}" > 
                                                            <input type="hidden" id="hw_id" name="hw_id" value="{{ $user->hw_descripcion_id}}" > 
                                                            <button type="submit" class="btn btn-warning"><b>Remover</b></button>
                
                                                        </form>
                                                    </td>    
                                                </tr>
                                                @endforeach
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Departamento</th>
                                                        <th>Usuario</th>
                                                        <th>Status</th>
                                                        <th>Acciones</th>
                                                        
                                                    </tr>
                                                </tfoot>
                                        </table>
                                    </div>
                                    </div>
                
                                </div>
                            </div>
                        </div>
                    </div>
   
                </div>
                    -->

                <!-- /.card-body 
              </div>
        </div>
        
        </div>
        
        </div>
      </section>-->
      <div class="col-12">
      <section class="content"> 
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Equipos asignados.</h3>
            
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
        @section('plugins.Datatables', true)
{{-- Setup data for datatables --}}
@php
$heads = [
'ID',
'serial',
'Departamento',
'Usuario',
'status',    
['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
    <i class="fa fa-lg fa-fw fa-pen"></i>
</button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
      <i class="fa fa-lg fa-fw fa-trash"></i>
  </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
       <i class="fa fa-lg fa-fw fa-eye"></i>
   </button>';

   $config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
      <"row" <"col-12" tr> >
      <"row" <"col-sm-12 d-flex justify-content-start" f> >';
$config['paging'] = false;
$config["lengthMenu"] = [ 10, 50, 100, 500];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table1"  :heads="$heads"  striped hoverable  with-buttons with-footer footer-theme="light" beautify>
@foreach($userinv as $user)
<tr>
<td>{{$user->id }}</td>
<td>{{$user->serial }}</td>
<td>{{$user->nombre }} </td>
<td>{{$user->name }} {{$user->last_name }}</td>
<td>{{$user->status}}</td>
<td><a href="{{route('inventario.edit', $user)}}" class="btn btn-xs btn-default text-primary" title="Editar">
<i class="fa fa-lg fa-fw fa-pen"> </i></a>            
<form method="POST" action="{{ route('inventario.update', $user->id) }}"  role="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" id="id" name="id" value="{{ $user->id}}" > 
    <input type="hidden" id="hw_id" name="hw_id" value="{{ $user->hw_descripcion_id}}" > 
    <input type="hidden" id="serial" name="serial" value="{{ $user->serial}}" > 
    <input type="hidden" id="user_id" name="user_id" value="{{ $user->uid}}" > 
    <button type="submit" class="btn btn-warning"><b>Remover{{$user->id}}</b></button>

</form>
</td>


</tr>
@endforeach
</x-adminlte-datatable>

    </div>
                </div></div></div></div></div></section>
      </div>
</div>


  


    
    
@stop
 @section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>




<script>new DataTable('#example', {
    stateSave: true,
        order: [[0, 'desc']],
        layout: {
        topStart: {
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Data export'
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Data export'
                }
            ]
        }
    }
});

</script>

@stop