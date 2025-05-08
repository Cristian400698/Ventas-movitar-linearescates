@extends('layouts.main', ['activePage' => 'marketing', 'titlePage' => 'Marketing'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros: {{ $prepostredes->total() }}</h6>
                        <div class="card">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="col-md-6">
                                <form action="/searchmarkeprepos" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="searchmarkeprepos" class="form-control">
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
                                            <th>Numero de contacto</th>
                                            <th>Revision</th>
                                            <th>Causal</th>
                                            <th>Asesor</th>
                                            <th>Fecha y hora de venta</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($prepostredes as $prepostrede)
                                            <tr style="text-align: center">
                                                <td>{{$prepostrede->id}}</td>
                                                <td>{{$prepostrede->numero}}</td>
                                                <td>{{$prepostrede->documento}}</td>
                                                <td>{{$prepostrede->nombres}} {{$prepostrede->apellidos}}</td>
                                                <td>{{ $prepostrede->tipocliente }}</td>
                                                <td>{{ $prepostrede->planadquiere }}</td>
                                                <td>{{ $prepostrede->ncontacto }}</td>
                                                <td>{{ $prepostrede->revisados }}</td>
                                                <td>{{ $prepostrede->estadorevisado }}</td>
                                                <td>{{ $prepostrede->agente }}</td>
                                                <td>{{ $prepostrede->dia }} {{$prepostrede->hora}}</td>
                                                <td class="td-actions text-right">

                                                    <a href="/markeprepos/{{ $prepostrede->id }}/edit" class="btn btn-info"><i class="material-icons">edit</i></a>


                                                    <form action="{{ route('markeprepos.destroy',$prepostrede->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Esta seguro que desea eliminar el registro ?')">
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
                                    {{-- <p>

                                     
                                    <div class="col-md-6 mt-5">
                                        <form action="{{route('prepostredes.excel')}}">
                                            <div class="input-group">
                                                <input type="date" name="prepostredes1" class="form-control">
                                                <input type="date" name="prepostredes2" class="form-control">
                                                <span class="input-group-prepend">
                                                    <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px"><i class="material-icons">file_download</i>Descargar</button>
                                                </span>
                                            </div>
                                        </form>
                                   
                                    </p> --}}
                                </div>
                            </div>
                            {{-- Paginacion --}}
                            <div class="card-footer mr-auto">
                                {{ $prepostredes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection