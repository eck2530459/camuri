@extends('adminlte::page')
@section('title', 'Tickets')
@section('content')
 <!-- cambio de clave -->
 <div class="row">
    <div class="col-md-12">
      <form method="post" action="{{ route('user.password') }}" class="form-horizontal">
        @csrf
        @method('put')

        <div class="card ">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ __('Cambio password') }}</h4>
            <p class="card-category">{{ __('Password') }}</p>
          </div>
          <div class="card-body ">
            @if (session('status_password'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>{{ session('status_password') }}</span>
                  </div>
                </div>
              </div>
            @endif
            <div class="row">
              <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Password actual') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Password actual') }}" value="" required />
                  @if ($errors->has('old_password'))
                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label" for="input-password">{{ __('Nueva Password') }}</label>
              <div class="col-sm-7">
                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                  <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Nueva Password') }}" value="" required />
                  @if ($errors->has('password'))
                    <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirme nueva Password') }}</label>
              <div class="col-sm-7">
                <div class="form-group">
                  <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirme nueva Password') }}" value="" required />
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary"><b>{{ __('Cambio de password') }}</b></button>
          </div>
        </div>
       <!-- <button type="submit" class="btn btn-primary"><b>Crear</b></button> -->
      </form>
    </div>
  </div>

@stop