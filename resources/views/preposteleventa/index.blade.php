@extends('layouts.main', ['activePage' => 'Prepost', 'titlePage' => 'BACKOFFICE PREPOST TELEVENTAS'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $preposteleventa->total() }}</h6>
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <form action="/searchteleprepost" method="GET">
                                        <div class="input-group">
                                            <input type="search" name="searchteleprepost" class="form-control">
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
                                                @foreach ($preposteleventa as $preposteleventas)
                                                    <tr>
                                                        <td>{{ $preposteleventas->numero }}</td>
                                                        <td>{{ $preposteleventas->nombres }}</td>
                                                        <td>{{ $preposteleventas->documento }}</td>
                                                        <td>{{ $preposteleventas->planventa }}</td>
                                                        <td>{{ $preposteleventas->segmento }}</td>
                                                        <td>{{ $preposteleventas->observaciones }}</td>
                                                        <td>{{ $preposteleventas->revisados }}</td>
                                                        <td>{{ $preposteleventas->estadorevisado }}</td>
                                                        <td>{{ $preposteleventas->agente }}</td>
                                                        <td>{{ $preposteleventas->dia }} {{ $preposteleventas->hora }}</td>     
                                                            <td class="td-actions text-right">
                                                                <a
                                                                href="/preposteleventa/{{ $preposteleventas->id }}/edit"class="btn btn-info"><i
                                                                    class="material-icons">edit</i></a>

                                                            <form action="{{ route('preposteleventa.destroy', $preposteleventas->id) }}"
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
                                             <form action="{{route('prepostteleventa.excel')}}">
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
                                    {{ $preposteleventa->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
