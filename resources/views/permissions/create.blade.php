@extends('layouts.main', ['activePage' => 'Permissions', 'titlePage' => __('Nuevo permiso')])
@section('content')
    <div class="content">
        <div class="contaider-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('permissions.store') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Permisos</h4>
                                <p class="card-category">Ingresar datos</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label form="name" class="col-sm-2 col-form-label">Nombre del permiso</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" id="name" autofocus>
                                    </div>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn bg-info">Guardar</button>
                            </div>
                            <!--End footer-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
