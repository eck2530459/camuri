@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">Inicio | Crear Falla</p>
                <div class="row">
                <div class="col-12">
                    <a href="{{ url('/fallas') }}">
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
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descripción</label>
                            <br>
                            <textarea class="form-control" id="nombre" name="nombre" rows="3"></textarea>                            
                          </div>
                </div>
                                <div class="form-group">
                              </div>
                              <div class="col-8 text-center">
                                <button type="submit" class="btn btn-info  btn-round"><b>{{ __('Crear') }}</b></button>
                                
                              </div>
                </div>
            </form>
            
        </div>
    </div>
    </div>
</div>
@stop