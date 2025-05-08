@extends('layouts.main', ['activePage' => 'Plan', 'titlePage' => ''])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('planes.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Planes</h4>
                                <p class="card-category">Ingresar Nuevo Plan</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="planadquiere" class="col-sm-2 col-form-label">Plan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="planadquiere"
                                            placeholder="Ingrese plan" value="{{ old('planadquiere') }}" autofocus>
                                        @if ($errors->has('planadquiere'))
                                            <span class="error text-danger"
                                                for="input-name">{{ $errors->first('planadquiere') }}</span>
                                        @endif
                                    </div>
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
