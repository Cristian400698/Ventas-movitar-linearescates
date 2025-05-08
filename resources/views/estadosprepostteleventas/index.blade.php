@extends('layouts.main', ['activePage' => 'Prepost', 'titlePage' => 'VENTAS PREPOST TELEVENTAS'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $prepostteleventas->total() }} </h6>
                            <div class="card">
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>
                                <div class="col-md-6">
                                    <form action="/searchmisventaspreposttelev" method="GET">
                                        <div class="input-group">
                                            <input type="searestaPort" name="text" class="form-control" autofocus>
                                            <span class="input-group-prepend">
                                                <button type="submit" class="btn btn-info btn-sm" style="border-radius: 10px">Buscar por Numero</button>
                                            </span>
                                        </div>
                                    </form>
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
                                                <th>Revisados</th>
                                                <th>Estado</th>
                                                <th>Fecha Venta</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($prepostteleventas as $prepostteleventa)
                                                <tr style="text-align: center">
                                                    <td>{{$prepostteleventa->documento}}</td>
                                                    <td>{{$prepostteleventa->nombres}} </td>
                                                    <td>{{$prepostteleventa->revisados}}</td>
                                                    <td>{{$prepostteleventa->estadorevisado}}</td>
                                                    <td>{{$prepostteleventa->dia}}</td>                                                 

                                                </tr>
                                            @endforeach
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>                                                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection