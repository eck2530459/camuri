@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')

@if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">Inicio | Tickets</p>
                <div class="row">
                <div class="col-10">
                    <h5>Tickets</h5>
                </div>
                <div class="col-2">
                    <a href="{{route('ticket.create') }}">
            <x-adminlte-button label="Crear Ticket" theme="primary" icon="fa fa-file"/>                    
        </a>
                </div>
                </div>
                <br>
                <div class="col-12">
                    <livewire:ticket-table theme="bootstrap-5"/>
                </div>
            </div>   
        </div> 
    </div>
</div>
@else
@section('content')

<META HTTP-EQUIV="REFRESH" CONTENT="1;{{route('home.index') }}">

    <x-adminlte-alert theme="success" title="Ticket creado">
       ¡Reporte creado exitosamente!
    </x-adminlte-alert>
@endif

@stop