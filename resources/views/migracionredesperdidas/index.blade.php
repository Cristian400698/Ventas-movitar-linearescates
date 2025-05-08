@extends('layouts.main', ['activePage' => 'RedesSociales', 'titlePage' => 'PERDIDAS REDES SOCIALES MIGRACION'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros:  {{ $migracionredesperdidas->total() }}</h6>
                        <div class="card">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                            {{ session('success') }}
                            </div>
                            @endif
                            <div class="form-group col-md-6">
                                <input hidden>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead class="text-info" style="text-align: center">
                                            <th>#</th>
                                            <th>Numero</th>
                                            <th>Documento</th>
                                            <th>Nombres y Apellidos</th>
                                            <th>Tipo de cliente</th>
                                            <th>Plan adquiere</th>                                           
                                            <th>Numero de contacto</th>
                                            <th>Revision</th>
                                            <th>Causal</th>
                                            <th>Asesor</th>
                                            <th>Fecha y hora de venta</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($migracionredesperdidas as $migracionredesperdida)
                                                <tr style="text-align: center">
                                                    <td>{{$migracionredesperdida->id}}</td>
                                                    <td>{{$migracionredesperdida->numero}}</td>
                                                    <td>{{$migracionredesperdida->documento}}</td>
                                                    <td>{{$migracionredesperdida->nombres}} {{$migracionredesperdida->apellidos}}</td>
                                                    <td>{{ $migracionredesperdida->tipocliente }}</td>
                                                    <td>{{ $migracionredesperdida->planadquiere }}</td>                                             
                                                    <td>{{ $migracionredesperdida->ncontacto }}</td>
                                                    <td>{{ $migracionredesperdida->revisados }}</td>
                                                    <td>{{ $migracionredesperdida->estadorevisado }}</td>
                                                    <td>{{ $migracionredesperdida->agente }}</td>
                                                    <td>{{ $migracionredesperdida->fvc }} {{$migracionredesperdida->hora}}</td>
                                                    
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                               {{-- @can('desacarga') --}}
                            <div class="col-md-6 mt-5">
                                <form action="{{route('migracionredes.excel')}}">
                                            <div class="input-group">
                                                <input type="date" name="migracionredes1" class="form-control">
                                                <input type="date" name="migracionredes2" class="form-control">
                                                <span class="input-group-prepend">
                                                    <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px"><i class="material-icons">file_download</i>Descargar</button>
                                                </span>
                                            </div>
                                        </form>
                            </div> 
                            {{-- @endcan --}}
                            {{-- Paginacion --}}
                            <div class="card-footer mr-auto">
                                {{ $migracionredesperdidas->links() }}  
                            </div>                                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
