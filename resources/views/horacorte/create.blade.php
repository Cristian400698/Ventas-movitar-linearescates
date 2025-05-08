@extends('layouts.main', ['activePage' => 'supervisor', 'titlePage' => 'Supervisor Personal'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div class="card ">
                            <!--Header-->
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Asignar Personal</h4>
                                <p class="card-category">Ingresar datos del Uusario</p> 
                            </div>
                            <!--End header-->
                            <!--Body-->
                            <div class="card-body">
                                <form action="/searchsuperpersonal" method="GET">
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Buscar por cedula</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="text" autocomplete="off"
                                                autofocus>
                                        </div>
                                    </div>
                                </div>
                            </form>
                   
                                <div class="row">
                                    <label for="name" class="col-sm-2 col-form-label">Usuarios</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="tab-content">
                                                <div class="tab-pane active">
                                                    <table class="table">
                                                        <tbody>
                                                            @foreach ($users as $user) 
                                                                <tr>
                                                                  {{--   <td>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" name="permissions[]"
                                                                                    value="  {{ $user->id }} ">
                                                                                <span class="form-check-sign">
                                                                                    <span class="check"></span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </td> --}}
                                                                    <td>
                                                                        {{ $user->name }} 
                                                                    </td>
                                                                    <td>
                                                                        {{ $user->cedula }} 
                                                                    </td>
                                                                    <td>
                                                                        <form action="{{route('superpersonal.update', $user->id)}}" method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <button class="btn btn-success">Asignar</button>
                                                                        </form> 
                                                                       {{--   <a href="{{ route('superpersonal.store') }}" class="btn btn-success">Asignar</a>  --}}
                                                                    </td>
                                                                </tr>
                                                            @endforeach 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-footer mr-auto">
                                                   {{ $users->links() }} 
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--End body-->

                            <!--Footer-->
                           {{--  <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-info">Guardar</button>
                            </div> --}}
                            <!--End footer-->
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
