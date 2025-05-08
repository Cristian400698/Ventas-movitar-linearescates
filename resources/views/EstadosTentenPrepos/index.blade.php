@extends('layouts.main', ['activePage' => 'tenten', 'titlePage' => 'VENTAS'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $tentenprepos->total() }} </h6>
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
                                                @foreach ($tentenprepos as $tentenprepos)
                                                <tr style="text-align: center">
                                                    <td>{{$tentenprepos->documento}}</td>
                                                    <td>{{$tentenprepos->nombres}} </td>
                                                    <td>{{$tentenprepos->apellidos}}</td>
                                                    <td>{{$tentenprepos->tipocliente}}</td>
                                                    <td>{{$tentenprepos->revisados}}</td>
                                                    <td>{{$tentenprepos->estadorevisado}}</td>
                                                    <td>{{$tentenprepos->dia}}</td>                                                 

                                                </tr>
                                            @endforeach
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                                <div class="card-footer mr-auto">
                                    {{-- {{ $tentenprepos->links() }}    --}}
                                </div>                                                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection