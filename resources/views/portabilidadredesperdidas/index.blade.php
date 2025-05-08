@extends('layouts.main', ['activePage' => 'RedesSociales', 'titlePage' => 'PERDIDAS REDES SOCIALES PORTABILIDAD'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros:  {{ $portabilidadredesperdidas->total() }}</h6>
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
                                            @foreach ($portabilidadredesperdidas as $portabilidadredesperdida)
                                                <tr style="text-align: center">
                                                    <td>{{$portabilidadredesperdida->id}}</td>
                                                    <td>{{$portabilidadredesperdida->numero}}</td>
                                                    <td>{{$portabilidadredesperdida->documento}}</td>
                                                    <td>{{$portabilidadredesperdida->nombres}} {{$portabilidadredesperdida->apellidos}}</td>
                                                    <td>{{ $portabilidadredesperdida->tipocliente }}</td>
                                                    <td>{{ $portabilidadredesperdida->planadquiere }}</td>                                             
                                                    <td>{{ $portabilidadredesperdida->ncontacto }}</td>
                                                    <td>{{ $portabilidadredesperdida->revisados }}</td>
                                                    <td>{{ $portabilidadredesperdida->estadorevisado }}</td>
                                                    <td>{{ $portabilidadredesperdida->agente }}</td>
                                                    <td>{{ $portabilidadredesperdida->fvc }} {{$portabilidadredesperdida->hora}}</td>
                                                    
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                               {{-- @can('desacarga') --}}
                            <div class="col-md-6 mt-5">
                                <form action="{{route('portabilidadredes.excel')}}">
                                            <div class="input-group">
                                                <input type="date" name="portabilidadredes1" class="form-control">
                                                <input type="date" name="portabilidadredes2" class="form-control">
                                                <span class="input-group-prepend">
                                                    <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px"><i class="material-icons">file_download</i>Descargar</button>
                                                </span>
                                            </div>
                                        </form>
                            </div> 
                            {{-- @endcan --}}
                            {{-- Paginacion --}}
                            <div class="card-footer mr-auto">
                                {{ $portabilidadredesperdidas->links() }}  
                            </div>                                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
