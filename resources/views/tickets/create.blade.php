@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">Inicio | Crear Ticket</p>
                <div class="row">
                <div class="col-12">
                    <a href="{{ url('/tickets') }}">
                        <x-adminlte-button label="Volver" theme="primary" icon="fa fa-arrow-back"/>                    
                    </a>
                </div>
                </div>
              
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('ticket.store') }}">
                    @csrf
                    <div class="row">
                    <div class="col-12">
                            <livewire:categorias /> 
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Detalle de la Falla</label>
                            <br>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>                            
                          </div>
                </div>
                <input type="hidden" id="status" name="status" value="Abierto">
                                <div class="form-group">
                                  <input type="hidden" id="user_id" name="user_id" value= {{Auth::user()->id}} >
                              </div>
                              <div class="col-8 text-center">
                                <button type="submit" class="btn btn-info  btn-round"><b>{{ __('Crear Ticket') }}</b></button>
                                
                              </div>
                </div>
            </form>
            
        </div>
    </div>
    </div>
</div>
@stop