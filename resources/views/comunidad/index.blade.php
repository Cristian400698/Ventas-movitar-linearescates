@extends('layouts.main', ['activePage' => 'comunidad', 'titlePage' => ''])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros: {{ $comunidad->total() }}</h6>
                        <div class="card">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="col-md-6">
                                <form action="/searchcomunidad" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="searchcomunidad" class="form-control">
                                        <span class="input-group-prepend">
                                            <button type="submit" class="btn btn-info btn-sm" style="border-radius: 10px">Buscar por Numero</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
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
                                            <th>segmento</th>
                                            <th>Numero de contacto</th>
                                            <th>Revision</th>
                                            <th>Causal</th>
                                            <th>Asesor</th>
                                            <th>Fecha y hora de venta</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($comunidad as $comunidads)
                                            <tr style="text-align: center">
                                                <td>{{$comunidads->id}}</td>
                                                <td>{{$comunidads->numero}}</td>
                                                <td>{{$comunidads->documento}}</td>
                                                <td>{{$comunidads->nombres}} {{$comunidads->apellidos}}</td>
                                                <td>{{ $comunidads->tipocliente }}</td>
                                                <td>{{ $comunidads->planadquiere }}</td>
                                                <td>{{ $comunidads->segmento }}</td>
                                                <td>{{ $comunidads->ncontacto }}</td>
                                                <td>{{ $comunidads->revisados }}</td>
                                                <td>{{ $comunidads->estadorevisado }}</td>
                                                <td>{{ $comunidads->agente }}</td>
                                                <td>{{ $comunidads->dia }} {{$comunidads->hora}}</td>
                                                <td class="td-actions text-right">

                                                    <a href="/comunidad/{{ $comunidads->id }}/edit" class="btn btn-info"><i class="material-icons">edit</i></a>


                                                    <form action="{{ route('comunidad.destroy',$comunidads->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Esta seguro que desea eliminar el registro ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- boton dedescarga --}}
                                    <p>

                                        {{-- @can('desacarga') --}}
                                    <div class="col-md-6 mt-5">
                                        <form action="{{route('comunidad.excel')}}">
                                            <div class="input-group">
                                                <input type="date" name="searchcomunidad1" class="form-control">
                                                <input type="date" name="searchcomunidad2" class="form-control">
                                                <span class="input-group-prepend">
                                                    <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px"><i class="material-icons">file_download</i>Descargar</button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- @endcan --}}
                                    </p>
                                </div>
                            </div>
                            {{-- Paginacion --}}
                            <div class="card-footer mr-auto">
                                {{ $comunidad->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection