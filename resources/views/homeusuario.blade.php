
@extends('adminlte::page')
 
@section('title', 'AdminLTE')
 
@section('content\_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
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
            <li class="breadcrumb-item active">Dashboard || {{Auth::user()->rol->nombre}}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>


<!----------------------------------------------------------------------
    ---------------- Inicio DASHBOARD Usuario-------------------------------
    ------------------------------------------------------------------------
    ------------------------------------------------------------------------>
    @if (Auth::user()->rol->id == 3)
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-dark">
            <div class="inner">
              <h3>Ticket</h3>
  
              <p>Crear nuevo</p>
            </div>
            <div class="icon">
              <i class="fas fa-plus-circle"></i>
            </div>
            <a href="ticket/create" class="small-box-footer">Crear <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$tusuario}}</h3>
  
              <p>Mis Tickets</p>
            </div>
            <div class="icon">
              <i class="fas fa-arrow-circle-right"></i>
            </div>
            <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg"></i></a>
          </div>
        </div>
        <!-- Modal mis tickets-->
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Mis Tickets</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <livewire:ticket-table theme="bootstrap-5"/>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!--Fin Modal mis tickets -->
        
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>  {{$tusuarioasig}}</h3>
  
              <p>Mis tickets abiertos</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg3"></i></a>
          </div>
        </div>
<!-- Modal mis tickets abiertos-->
<div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Últimos 10 tickets abiertos</h5>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="form-group">
            <div class="col-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">fecha</th>
                    <th scope="col">Reporte</th>
                    <th scope="col">Status</th>                                                    
                    <th scope="col">Acciones </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($mtu3 as $i)
                  <tr>
                  <th scope="row">{{$i->id}}</th>
                    <td>{{$i->fecha}}</td>    
                    <td>{{$i->descripcion}}</td>    
                    
                    @if ($i->status == 'Culminado')
                    <td class="bg-success">
                      {{$i->status}}
                    </td>     
                    @endif
                    @if ($i->status == 'Asignado')
                    <td class="bg-warning">
                      {{$i->status}}
                    </td>     
                    @endif
                    @if ($i->status == 'Abierto')
                    <td class="bg-danger">
                      {{$i->status}}
                    </td>     
                    @endif
                    <td><a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a> </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Fin Modal mis tickets abiertos -->

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>  {{$tusuarioculm}}</h3>
  
              <p>Mis tickets culminados</p>
            </div>
            <div class="icon">
              <i class="fas fa-check-circle"></i>
            </div>
            <a href="#" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right" data-toggle="modal" data-target=".bd-example-modal-lg2"></i></a>
          </div>
 <!-- Modal mis tickets culminado-->
 <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Últimos 10 tickets culminados</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group">
            <div class="col-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">fecha</th>
                    <th scope="col">Reporte</th>
                    <th scope="col">Status</th>                                                    
                    <th scope="col">Acciones </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($mtu2 as $i)
                  <tr>
                  <th scope="row">{{$i->id}}</th>
                    <td>{{$i->fecha}}</td>    
                    <td>{{$i->descripcion}}</td>    
                    
                    @if ($i->status == 'Culminado')
                    <td class="bg-success">
                      {{$i->status}}
                    </td>     
                    @endif
                    @if ($i->status == 'Asignado')
                    <td class="bg-warning">
                      {{$i->status}}
                    </td>     
                    @endif
                    @if ($i->status == 'Abierto')
                    <td class="bg-danger">
                      {{$i->status}}
                    </td>     
                    @endif
                    <td><a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a> </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Fin Modal mis tickets culminados -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Inicio | Tickets por culminar</p>
                    <div class="row">
                    <div class="col-10">
                        <h5>Mis Tickets</h5>
                    </div>
                    <div class="col-2">
                        <a href="{{route('ticket.create') }}">
                <x-adminlte-button label="Crear Ticket" theme="primary" icon="fa fa-file"/>                    
            </a>
                    </div>
                    </div>
                    <br>
                    <div class="col-12">
                    
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reporte</th>
                            <th scope="col">Status</th>
                            <th scope="col">Respuesta de Analista</th>
                            <th scope="col">Acciones </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($tusuario2 as $i)
                            <tr>
                            <th scope="row">{{$i->id}}</th>
                            <td>{{$i->descripcion}}</td>
                            <td>{{$i->status}}</td>
                            <td>{{$i->respuesta}}</td>
                            <td>
                              <a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                              <button type="submit" class="btn btn-success btn-sm" data-toggle="modal"
                               data-target="#my_modal"  data-book-id="{{$n = $i->id}}"><i class="fa fa-fw fa-flag"></i></button>                          
                            </td>     
                          </tr>                         
                          @endforeach
                          <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  
                                  <h5 class="modal-title" id="exampleModalLabel">Culminar tickets</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  ¿Desea culminar el ticket?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                  <form action="{{ route('home.update', $n) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <input type="text" name="bookId" id="bookId" value="{{$n}}">                
    
                                  <button type="submit" class="btn btn-primary">Confirmar</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </tbody>
                      </table>
                    </div>
                </div>   
            </div> 
        </div>
    </div>      
    @endif
    @extends('layouts.footer')
    @stop
  
    <!--------------------------------------------------------
--------------------FIN Dashboard Usuario ----------------------
----------------------------------------------------------
---------------------------------------------------------->