@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')
<br>
<div class="row">
 
    <div class="col-8 text-left">
        <a href="{{ url('/fallas') }}">
            <x-adminlte-button label="Volver" theme="warning" icon="fa fa-arrow-left"/>                    
        </a>
    </div>
       
  </div>
<br>
<div class="card-header card-header-primary">
    <h4 class="card-title "><b>Editar </b></h4>
</div>
  <div class="card">
    <div class="card-body">
  <form method="POST" action="{{ route('fallas.update', $t->id) }}"  role="form" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Editar Categoría de Fallas</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{$t->nombre}}">
      <small id="emailHelp" class="form-text text-muted">Actualizar nombre de la falla</small>
    </div>
    <div class="form-group">
        <input type="hidden" id="id" name="id" value="{{$t->id}}" > 
                  </div>
    
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>

    </div>
  </div>
  



@stop