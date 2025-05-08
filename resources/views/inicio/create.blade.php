@extends('layouts.main', ['activePage' => 'porta', 'titlePage' => 'Portabilidad'])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('inicio.store') }}" method="post" class="form-horizontal">
          @csrf
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Alertas</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" name="descripcion" placeholder="Ingrese su descripcion" value="{{ old('descripcion') }}" autofocus>
                  @if ($errors->has('descripcion'))
                    <span class="error text-danger" for="input-name">{{ $errors->first('descripcion') }}</span>
                  @endif
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-info">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
