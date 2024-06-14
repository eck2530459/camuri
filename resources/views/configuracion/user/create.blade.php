@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <p class="mb-0">Inicio | Crear Usuario</p>
            <div class="row">
            <div class="col-4">
                <a href="{{ url('/user') }}">
                    <x-adminlte-button label="Volver" theme="primary" icon="fa fa-arrow-back"/>                    
                </a>
            </div>
<div class="col-8 text-right">
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        @includeif('partials.errors')
         
</div>
        </div>
          
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form class="form" method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="row">
                <div class="col-6">
                    <label for="name" class="form-label">Nombres:</label>
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombres" name="name" id="name" type="text" value="{{ old('name',$user->name) }}"  aria-label="Amount"/>                   
                     @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('name') }}</strong>
                    </div>
                  @endif
                </div>
                <div class="col-6">
                    <div class="form-group">
                    <label for="last_name" class="form-label">Apellidos:</label>
                    <input class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Apellidos" name="last_name" id="last_name" type="text" value="{{ old('last_name',$user->last_name) }}"  aria-label="Amount"/>                   
                     @if ($errors->has('last_name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                      <strong>{{ $errors->first('last_name') }}</strong>
                    </div>
                  @endif
                </div>
            </div>
                <div class="col-4">
                    <div class="form-group">
                    <label for="rols" class="form-label">Rol:</label>
                    <livewire:role /> 
                </div>
            </div>
                <div class="col-4">
                    <div class="form-group">
                    <label for="dept" class="form-label">Departamento:</label>
                    <livewire:dept /> 
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                <label for="cargo" class="form-label">Cargo:</label>
                <input class="form-control{{ $errors->has('cargo') ? ' is-invalid' : '' }}" placeholder="Ingrese cargo" name="cargo" id="cargo" type="text" value="{{ old('cargo',$user->cargo) }}"  aria-label="Amount"/>                   
                @if ($errors->has('cargo'))
               <div id="name-error" class="error text-danger pl-3" for="cargo" style="display: block;">
                 <strong>{{ $errors->first('cargo') }}</strong>
               </div>
             @endif
            </div>
        </div>
            <div class="col-4">
                <div class="form-group">
                <label for="email" class="form-label">E-mail:</label>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Ingrese correo" name="email" id="email" type="text" value="{{ old('email',$user->email) }}"  aria-label="Amount"/>                   
                     @if ($errors->has('email'))
                    <div id="name-error" class="error text-danger pl-3" for="email" style="display: block;">
                      <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
            </div>
        </div> 
            <div class="col-4">
                <div class="form-group">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="{{ __('Ingrese Password...') }}">
                <div id="passwordHelpBlock" class="form-text">
                    La contraseña debe contener al menos 8 carácteres, incluyendo mayúscula y al menos un signo de puntuación.
                  </div>
                  @if ($errors->has('password'))
                                        <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                          <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                      @endif
            </div>
        </div> 
        <div class="col-4">
            <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" aria-describedby="password_confirmation" placeholder="{{ __('Confirme Password...') }}">
           
              @if ($errors->has('password_confirmation'))
                                    <div id="password-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                  @endif
        </div>
    </div>
                <div class="form-group">
                    <input type="hidden" id="user_id" name="user_id" value= {{Auth::user()->id}} >
                </div>
                <div class="col-8 text-center">
                    <button type="submit" class="btn btn-info  btn-round"><b>{{ __('Crear Usuario') }}</b></button>          
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
</div>
@stop