@extends('layouts.main', ['activePage' => 'profile', 'titlePage' => __('')])

@section('content')
  <div class="content">
    <div class="container-fluid">      
      <div class="row">
        <div class="col-md-12">
            <center>
                <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                <h3 aline="center">PERFIL DE USUARIO</h3>
            </center>
          <form method="post" action="{{ route('perfil.update') }}" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-body ">
                <div class="row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}"autocomplete="name" disabled>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>               
                </div>
                <div class="row">
                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
                    <div class="col-md-6">
                        <input id="username" type="text"
                            class="form-control @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}"autocomplete="name" disabled>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}"autocomplete="email" disabled>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                  
                </div>  
                <div class="row">
                    <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>
                    <div class="col-md-6">
                        <input id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ Auth::user()->cedula }}" autocomplete="cedula" disabled>
                        @error('cedula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                  
                </div>  
                <div class="row">
                    <label for="mypassword"class="col-md-4 col-form-label text-md-right">{{ __('Contraseña cambiar') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="mypassword" autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                  
                </div>  
                <div class="row">

                  
                </div>  
                <div class="row">

                  
                </div>  
                
                







              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info btn-sm">{{ __('Guardar Cambios') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection