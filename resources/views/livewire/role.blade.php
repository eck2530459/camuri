    

      

      <select class="form-control " data-style="btn btn-link"  id="categoria1" name="categoria1" wire:model="categoria1" required>

<option value=''> Seleccione Rol</option>

@foreach ($categorias as $categori)
<option value="{{$categori->id}}"> {{$categori->nombre}}</option>
@endforeach

</select>


      
   
       