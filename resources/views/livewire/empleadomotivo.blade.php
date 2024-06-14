<div class="container">
    <div class="row">
      <div class="col-sm-12">
      <div class="form-group">
      <label for="categoria"><b>Motivos de Entrada:</b></label>
      <select name="motivo_id" id="motivo_id" class="form-control" required>
        <option value=''> Seleccione Motivo</option>

        @foreach ($motivo as $categori)
<option value="{{$categori->id}}"> {{$categori->descripcion }} </option>
@endforeach

</select>
</div>

       </div>    
    </div>
</div>