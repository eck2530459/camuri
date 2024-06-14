@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')
<div class="row">
 @if (Auth::user()->rol_id == 3)
 <div class="col-8 text-left">
    <a href="{{ url('/home') }}">
        <x-adminlte-button label="Volver" theme="warning" icon="fa fa-arrow-left"/>                    
    </a>
</div>
@else
    <div class="col-8 text-left">
        <a href="{{ url('/tickets') }}">
            <x-adminlte-button label="Volver" theme="warning" icon="fa fa-arrow-left"/>                    
        </a>
    </div>
    @endif
   @if (Auth::user()->rol_id == 1)
       
   
    <div class="col-4 text-right">
        <a href="{{route('ticket.show', $ticket->id) }}">
            <x-adminlte-button label="Eliminar Ticket" theme="danger" icon="fa fa-ban"/>                    
        </a>
    </div>
    @endif
  </div>
  <br>
<div class="card">
   
    <div class="card-header card-header-primary">
        <h4 class="card-title "><b>Ticket #{{$ticket->id}} Status: {{$t->status}}</b></h4>
    </div>
    <div class="row">
        <div class="col-sm-6">
                  <div class="card-body" >
                  <div class="form-group">
                    <h1 class="card-title">                 
                   
                    <small class="text-muted">
                        <b>Datos del ticket: </b>
                    </small></h1>
                  </div>
                </div>
                <div class="form-group">
                    <strong><b>Fecha de reporte:&nbsp;</b></strong>
                    <input class="form-control" name="created_at" id="created_at" type="text" value="{{$ticket->created_at->format('d-m-Y');}}" disabled aria-required="true"/>
                    
                </div>
                <div class="form-group">
                    <strong><b>Hora de reporte:&nbsp;</b></strong>
                    <input class="form-control" name="createda_at" id="createda_at" type="text" value="{{$ticket->created_at->isoFormat('H:mm A');}}" disabled aria-required="true"/>  
                    
                </div>
                <div class="form-group">
                    <strong><b>Categoría de reporte:&nbsp;</b></strong>
                    <select class="form-control " data-style="btn btn-link"  id="categoria" name="categoria" wire:model="categoria"> 
                        <option value="1">{{$ticketdetalle[0]->asunto_detalle->nombre}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <strong><b>Detalle del reporte:&nbsp;</b></strong>  
                    <textarea class="form-control" name="descripcion" id="descripcion" type="text" value="" disabled aria-required="true">{{$ticketdetalle[0]->descripcion}}</textarea>  
                </div>
                  

                 
        </div>
        <div class="col-sm-6">
            <div class="card-body">
                <div class="form-group">
                    <h1 class="card-title">                 
                   
                    <small class="text-muted">
                        <b>Datos del Usuario: </b>
                    </small></h1>
                  </div>
              <div class="form-group">
                
                <h6 class="card-title">  
                 <small class="text-muted"><b>
                     </b></small></h6><br>
            <strong><b>Usuario que reporta:&nbsp;</b></strong>
            
            {{$ticketdetalle[0]->user_detalle->name .' '. $ticketdetalle[0]->user_detalle->last_name}}
            
                           
                        </div>
                        <div class="form-group">
                            <strong><b>Departamento:&nbsp;</b></strong>
                            {{$ticketdetalle[0]->user_detalle->departamento->nombre }}                         
                        </div>
                        <div class="form-group">
                            <strong><b>Correo:&nbsp;</b></strong>
                           
                            {{$ticketdetalle[0]->user_detalle->email}}                         
                        </div>
                        <br> 
                        <div class="form-group">
                            <h1 class="card-title">                 
                           
                            <small class="text-muted">
                                <b>Respuesta de Analista: </b>
                            </small></h1>
                          </div>
                          <BR>
                <!--If para validar status Asignado y si corresponde al analista -->
                @if ($t->status == 'Asignado' && $ticketdetalle[0]->analista_id == Auth::user()->id)
                <!--If para validar si contiene una respuesta del analista -->
                @if ($ticketdetalle[0]->respuesta == NULL)
                    <div class="form-group">                                     
                        <form method="POST" action="{{ route('ticket.update', $ticket->id) }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="hidden" id="id" name="id" value="{{ $ticket->id}}" > 
                                    </div> 
                                    <div class="form-group">
                                        <strong><b>Respuesta:&nbsp;</b></strong>  
                                        <textarea required class="form-control" name="respuesta" id="respuesta" type="text" value="" aria-required="true">{{$ticketdetalle[0]->respuesta}}</textarea>  
                                    </div>

                                <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="row">
                                        <h6 class="card-title">  </h6>
                                        <div class="col-8">
                                        <div class="form-group">
                                    <input type="hidden" id="categoria" name="categoria" value="{{ Auth::user()->id}}" > 
                                              </div>
                                            </div>
                                      </div>
                                <div class="box-footer mt20 text-center">
                                <button type="submit" class="btn btn-primary"><b>Enviar</b></button>
                                </div>
                                <br>
                            </div>
                                </div>
                                </form>
                                <!--Else para mostrar el textarea si no cumple la condicion de respuesta -->
                                @else
                                <div class="form-group">                                     
                                    <textarea class="form-control" name="respuesta" id="respuesta" type="text" value="" disabled aria-required="true">{{$ticketdetalle[0]->respuesta}}</textarea>  
                                </div>
                
                        <!-- Endif de la primera validacion -->
                        @endif
                 
                        @else
                        <div class="form-group">                                     
                            <textarea class="form-control" name="respuesta" id="respuesta"disabled type="text" value="" aria-required="true">{{$ticketdetalle[0]->respuesta}}</textarea>  

                            </div>               
                             @if (Auth::user()->rol_id == 3 && $t->status== 'Asignado' || $t->status== 'Culminado' )
                             <div class="form-group">
                                <strong><b>Analista:&nbsp;</b></strong>
                               
                                {{$analista[0]->name}} {{$analista[0]->last_name}}<br>
                                <strong><b>Cargo:&nbsp;</b></strong>
                                {{$analista[0]->cargo}} 

                            </div>     
                             @endif   
                            
                        </div>  
                        
                        
                        @endif
                        


                         
                </div>
          </div>
</div>
</div>
    <!--Valida si el usuario logeado es Admin
    Si el usuario es Admin se crea un componente de livewire con los analistas
y permite asignar a cualquiera -->    
    @if ( ( (Auth::user()->rol_id) == '1' ) )
<!--Valida si el campo analista_id es NULL 
    Si es Null significa el ticket no tiene un analista asignado-->    
    @if (is_null($ticketdetalle[0]->analista_id))
<div class="card"> 
    <div class="card-header card-header-primary">
        <h4 class="card-title ">
            <b>Analista {{$ticketdetalle[0]->analista_id}}</b></h4>
    </div>    
    <form method="POST" action="{{ route('ticket.update', $ticket->id) }}"  role="form" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" id="id" name="id" value="{{ $ticket->id}}" > 
        </div>           
        @csrf
    @method('PUT')
    <div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <h6 class="card-title">  </h6>
              <div class="col-8">
                  <div class="form-group">
                      <livewire:analista />
                  </div>
                </div>
          </div>
    <div class="box-footer mt20 text-center">
    <button type="submit" class="btn btn-primary"><b>Asignar</b></button>
    </div>
    <br>
</div>
    </div>
    </form>
</div>

     <!--ELSE si analista_id es != a NULL-->
    @else
    <div class="card"> 
        <div class="card-header card-header-primary">
            <h4 class="card-title ">
                <b>Analista:: {{$ticketdetalle[0]->analista_id}}</b></h4>
        </div> 
    <div class="box-footer mt20 text-center">
       Ticket asignado a: {{$analista[0]->name}} {{$analista[0]->last_name}}
        </div>
    <div class="box-footer mt20 text-center">
       Cargo: {{$analista[0]->cargo}}
        </div><br>
        {!! Form::open(['route' => ['ticket.destroy', $ticket->id]]) !!}
        @csrf
        @method('delete')
        <div class="box-footer mt20 text-center">
            <button type="submit" class="btn btn-danger"><b>Eliminar</b></button>
            </div>
        {!! Form::close() !!}
    </div>

    @endif


    <div class="card"> 
        <div class="card-header card-header-primary">
            <h4 class="card-title ">
                <b>Historial del Ticket </b></h4>
        </div> 
        <div class="box-footer mt20 text-center">
            Reporte: {{$mtu3[0]->asunto}}  Reporte: {{$mtu3[0]->asunto}} 
            <br>
             </div>
        <div class="col-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Razón Status</th>
                  <th scope="col">Reporte</th>                                           
                  <th scope="col">Respuesta Analista</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mtu3 as $i)
                <tr>
                <th scope="row">{{$i->id}}</th>
                  <td>{{$i->razon_estatus}}</td>    
                  <td>{{$i->descripcion}}</td>    
                  <td>{{$i->respuesta}}</td>    
                  <td><a class="btn btn-sm btn-primary btn-sm" href="{{ route('ticket.edit',$i->id) }}"><i class="fa fa-fw fa-eye"></i> </a> </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
        </div>
  
    
    </div>
    
        @endif
        <!--Fin IF de usuario admin -->
        <!--Inicio IF de usuario analista -->
        @if ( ( (Auth::user()->id) == '3' ) )
        <!--Inicio IF de status Abierto -->
        @if ($t->status == 'Abierto')
        <div class="card"> 
            <div class="card-header card-header-primary">
                <h4 class="card-title ">
                    <b>Analista </b></h4>
            </div>    
            <form method="POST" action="{{ route('ticket.update', $ticket->id) }}"  role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" id="id" name="id" value="{{ $ticket->id}}" > 
                </div>           
                @csrf
            @method('PUT')
            <div class="box box-info padding-1">
            <div class="box-body">
                <div class="row">
                    <h6 class="card-title">  </h6>
                    <div class="col-8">
                    <div class="form-group">
                <input type="hidden" id="categoria" name="categoria" value="{{ Auth::user()->id}}" > 
                          </div>
                        </div>
                  </div>
            <div class="box-footer mt20 text-center">
            <button type="submit" class="btn btn-primary"><b>Tomar ticket</b></button>
            </div>
            <br>
        </div>
            </div>
            </form>
        </div>
        <!--FIN IF de status -->
      @endif
      <!--INICIO IF de status ASIGNADO -->
      @if ($t->status == 'Asignado')
      <div class="card"> 
        <div class="card-header card-header-primary">
            <h4 class="card-title ">
                <b>Analista:: {{$ticketdetalle[0]->analista_id}}</b></h4>
        </div> 
    <div class="box-footer mt20 text-center">
       Ticket asignado a: {{$analista[0]->name}} {{$analista[0]->last_name}}
        </div>
    <div class="box-footer mt20 text-center">
       Cargo: {{$analista[0]->cargo}}
        </div><br>
        {!! Form::open(['route' => ['ticket.destroy', $ticket->id]]) !!}
        @csrf
        @method('delete')
        @if ($ticketdetalle[0]->analista_id == Auth::user()->id)
        <div class="box-footer mt20 text-center">
            <button type="submit" class="btn btn-danger"><b>Eliminar</b></button>
            </div> 
            <br>   
        @endif
        
        {!! Form::close() !!}
    </div>
    <!--FIN IF de status ASIGNADO -->
      @endif
        <!--Fin IF de usuario analista -->
    @endif

@stop