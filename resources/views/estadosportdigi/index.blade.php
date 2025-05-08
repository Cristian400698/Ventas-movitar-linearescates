@extends('layouts.main', ['activePage' => 'porta', 'titlePage' => 'VENTAS PORTA DIGITAL'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $portadigitals->total() }} </h6>
                            <div class="card">
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>
                                <div class="col-md-6">
                                    <form action="/searchmisventasportadigital" method="GET">
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
                                                <th>Apellido</th>
                                                <th>Tipo Cliente</th>
                                                <th>Revisados</th>
                                                <th>Estado</th>
                                                <th>Fecha Venta</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($portadigitals as $portadigital)
                                                <tr style="text-align: center">
                                                    <td>{{$portadigital->documento}}</td>
                                                    <td>{{$portadigital->nombres}} </td>
                                                    <td>{{$portadigital->apellidos }}</td>
                                                    <td>{{$portadigital->tipocliente}}</td>
                                                    <td>{{$portadigital->revisados}}</td>
                                                    <td>{{$portadigital->estadorevisado}}</td>
                                                    <td>{{$portadigital->dia}}</td>                                                 

                                                </tr>
                                            @endforeach
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                                <div class="card-footer mr-auto">
                                    {{ $portadigitals->links() }}   
                                </div>                                                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection