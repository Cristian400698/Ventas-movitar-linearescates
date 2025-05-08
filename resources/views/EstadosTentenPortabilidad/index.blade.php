@extends('layouts.main', ['activePage' => 'tenten', 'titlePage' => 'VENTAS'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $tentenportabilidad->total() }} </h6>
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
                                                @foreach ($tentenportabilidad as $tentenportabilidads)
                                                <tr style="text-align: center">
                                                    <td>{{$tentenportabilidads->documento}}</td>
                                                    <td>{{$tentenportabilidads->nombres}} </td>
                                                    <td>{{$tentenportabilidads->apellidos}}</td>
                                                    <td>{{$tentenportabilidads->tipocliente}}</td>
                                                    <td>{{$tentenportabilidads->revisados}}</td>
                                                    <td>{{$tentenportabilidads->estadorevisado}}</td>
                                                    <td>{{$tentenportabilidads->dia}}</td>                                                 

                                                </tr>
                                            @endforeach
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                                <div class="card-footer mr-auto">
                                    {{ $tentenportabilidad->links() }}   
                                </div>                                                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection