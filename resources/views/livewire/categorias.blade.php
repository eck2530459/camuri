<div class="container">
    <div class="row">
      <div class="col-sm-12">
      <div class="form-group">
      <label for="categoria"><b>Lista de Fallas:</b></label>
      <select class="form-control " data-style="btn btn-link"  id="categoria" name="categoria" wire:model="categoria">

<option value=''> Seleccione  Categoría</option>

@foreach ($categorias as $categori)
<option value="{{$categori->id}}"> {{$categori->nombre}}</option>
@endforeach

</select>
</div>

       </div>    
    </div>
</div>
       