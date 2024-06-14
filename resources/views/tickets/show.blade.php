@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')

<br>
<div class="card">
   
  <div class="car-header card-header-primary">
    <h4 class="card-title ">Confirmar</h4>
  </div>
        <div class="m-0 row justify-content-center">
            <div class="col-auto text-center">
                 <i class="fa fa-exclamation-circle fa-10x" style="color:#D5CC21;"></i><br>
                 <marquee>¡Esta acción no se puede revertir!</marquee>
                    ¿Desea eliminar el <b>Ticket #{{$ticket->id}}</b>?</h4>
  </div>
</div>
<br>
<div class="row">
    <div class="col-6" >
    <div class="box-footer mt20 text-right">
        <a href="{{ route('ticket.edit', $ticket->id) }}">
            <x-adminlte-button label="Cancelar" theme="warning" icon="fa fa-arrow-left"/>                    
        </a>
   
    </div>
    </div>
    <div class="col-6" >
        <div class="box-footer mt20 text-left">
            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="formulario-confirmar">
                @csrf
                @method('DELETE')
                                
                <button type="submit" label="Confirmar" class="btn btn-danger"><i class="fa fa-ban"></i> Confirmar</button>

            </form>
        </div>
        </div>
    
  </div>
  </div>
  






@stop