@extends('layouts.main', ['activePage' => 'Prepost', 'titlePage' => 'BACKOFFICE PREPOST INBOUND'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $prepostinbound->total() }}</h6>
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <form action="/searchinnboundprepost" method="GET">
                                        <div class="input-group">
                                            <input type="search" name="searchinnboundprepost" class="form-control">
                                            <span class="input-group-prepend">
                                                <button type="submit" class="btn btn-info btn-sm"
                                                    style="border-radius: 10px">Buscar por Numero</button>
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
                                                <th>Numero</th>
                                                <th>Nombres</th>
                                                <th>Documento</th>
                                                <th>Plan venta</th>
                                                <th>segmento</th>
                                                <th>Observaciones</th>
                                                <th>Revision</th>
                                                <th>estadorevisado</th>
                                                <th>Asesor</th>
                                                <th>Fecha venta</th>
                                                <th>Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($prepostinbound as $prepostinbounds)
                                                    <tr>
                                                        <td>{{ $prepostinbounds->numero }}</td>
                                                        <td>{{ $prepostinbounds->nombres }}</td>
                                                        <td>{{ $prepostinbounds->documento }}</td>
                                                        <td>{{ $prepostinbounds->planventa }}</td>
                                                        <td>{{ $prepostinbounds->segmento }}</td>
                                                        <td>{{ $prepostinbounds->observaciones }}</td>
                                                        <td>{{ $prepostinbounds->revisados }}</td>
                                                        <td>{{ $prepostinbounds->estadorevisado }}</td>
                                                        <td>{{ $prepostinbounds->agente }}</td>
                                                        <td>{{ $prepostinbounds->dia }} {{ $prepostinbounds->hora }}</td>      
                                                            <td class="td-actions text-right">
                                                                <a
                                                                href="/prepostinbound/{{ $prepostinbounds->id }}/edit"class="btn btn-info"><i
                                                                    class="material-icons">edit</i></a>

                                                            <form action="{{ route('prepostinbound.destroy', $prepostinbounds->id) }}"
                                                                method="POST" style="display: inline-block;"
                                                                onsubmit="return confirm('Esta seguro que desea eliminar el registro ?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit"
                                                                    rel="tooltip">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </form>


                                                            </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <p>
                                    
                                            {{--  @can('desacarga') --}}
                                            <div class="col-md-6 mt-5">
                                             <form action="{{route('prepostinbound.excel')}}">
                                                 <input type="hidden" name="date1" id="" value="1">
                                                 <div class="input-group">
                                    <input type="date" name="searchcreditodate1" class="form-control">
                                    <input type="date" name="searchcreditodate2" class="form-control">
                                    <span class="input-group-prepend">
                                        <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px"><i
                                            class="material-icons">file_download</i>Descargar</button>
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
                                    {{ $prepostinbound->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
