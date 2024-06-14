<div class="container">
    <div class="row">
      <div class="col-sm-12">
      <div class="form-group">
      <label for="categoria"><b>Lista de Analistas:</b></label>
      <select class="form-control " data-style="btn btn-link"  id="categoria" name="categoria" wire:model="categoria" required>

<option value=''> Seleccione  Analista</option>

@foreach ($analista_id as $categori)
<option value="{{$categori->id}}"> {{$categori->name.' '. $categori->last_name.' || '. $categori->cargo}} </option>
@endforeach

</select>
</div>

       </div>    
    </div>
</div>