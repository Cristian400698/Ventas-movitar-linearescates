@extends('layouts.main', ['activePage' => 'RedesSociales', 'titlePage' => 'VENTAS'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $migracionredesventas->total() }} </h6>
                            <div class="card">
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-info" style="text-align: center">
                                                <th>Documento</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Tipo Cliente</th>
                                                <th>Revisados</th>
                                                <th>Estado</th>
                                                <th>Fecha Venta</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($migracionredesventas as $migracionredesventa)
                                                <tr style="text-align: center">
                                                    <td>{{$migracionredesventa->documento}}</td>
                                                    <td>{{$migracionredesventa->nombres}} </td>
                                                    <td>{{$migracionredesventa->apellidos}}</td>
                                                    <td>{{$migracionredesventa->tipocliente}}</td>
                                                    <td>{{$migracionredesventa->revisados}}</td>
                                                    <td>{{$migracionredesventa->estadorevisado}}</td>
                                                    <td>{{$migracionredesventa->dia}}</td>                                                 

                                                </tr>
                                            @endforeach
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                                <div class="card-footer mr-auto">
                                    {{ $migracionredesventas->links() }}   
                                </div>                                                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection