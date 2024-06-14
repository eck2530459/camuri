<div class="container">
    <div class="row">
      <div class="col-sm-12">
      <div class="form-group">
        <small class="text-muted">
            <b>Departamento: </b>
        </small>
      <select class="form-control " data-style="btn btn-link" id="clientId" name="clientId" wire:model.live="clientId" label="clientId" required>
        <option selected value="">Seleccione</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->nombre }} </option>
        @endforeach
    </select>
</div>
       </div>    
       
          <div class="col-sm-12">
          <div class="form-group">
            <small class="text-muted">
                <b>Usuario: </b>
            </small>   
          <select class="form-control " data-style="btn btn-link" id="contactId" name="contactId" wire:model="contactId" required>
            <option selected  value=""> Debe elegir un departamento</option>
            @foreach ($contacts as $contact)
                <option value="{{ $contact->id }}">
                    {{ $contact->name }} {{ $contact->last_name }}</option>
            @endforeach
        </select>
    </div>
           </div>  
    </div>
</div>