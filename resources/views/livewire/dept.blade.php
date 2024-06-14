    

      

      <select class="form-control " data-style="btn btn-link"  id="categoria" name="categoria" wire:model="categoria" required>

        <option value=''>Elija Departamento</option>
        
        @foreach ($categorias as $categori)
        <option value="{{$categori->id}}"> {{$categori->nombre}}</option>
        @endforeach
        
        </select>
        
        
              
           
               