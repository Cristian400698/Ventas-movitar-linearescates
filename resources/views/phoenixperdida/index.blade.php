@extends('layouts.main', ['activePage' => 'phoenix', 'titlePage' => 'PERDIDAS PHOENIX'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $phoenixes->total() }}</h6>
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <form action="/searchphoenixperdida" method="GET">
                                        <div class="input-group">
                                            <input type="search" name="searchphoenixperdida" class="form-control">
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
                                                <th>Documento</th>
                                                <th>Nombres y Apellidos</th>
                                                <th>Tipo de cliente</th>
                                                <th>Plan adquiere</th>
                                                <th>Numero de contacto</th>
                                                <th>Revision</th>
                                                <th>Causal</th>
                                                <th>Asesor</th>
                                                @can('user_destroy')
                                                    <th>Acciones</th>
                                                @endcan
                                            </thead>
                                            <tbody>
                                                @foreach ($phoenixes as $phoenix)
                                                    <tr>
                                                        <td>{{ $phoenix->numero }}</td>
                                                        <td>{{ $phoenix->documento }}</td>
                                                        <td>{{ $phoenix->nombres }} {{ $phoenix->apellidos }}</td>
                                                        <td>{{ $phoenix->tipocliente }}</td>
                                                        <td>{{ $phoenix->planadquiere }}</td>
                                                        <td>{{ $phoenix->ncontacto }}</td>
                                                        <td>{{ $phoenix->revisados }}</td>
                                                        <td>{{ $phoenix->estadorevisado }}</td>
                                                        <td>{{ $phoenix->agente }}</td>
                                                        @can('user_destroy')
                                                            <td class="td-actions text-right">
                                                                <a
                                                                href="/phoenixperdida/{{ $phoenix->id }}/edit"class="btn btn-info"><i
                                                                    class="material-icons">edit</i></a>

                                                          <!--   <form action="{{ route('phoenixperdida.destroy', $phoenix->id) }}"
                                                                method="POST" style="display: inline-block;"
                                                                onsubmit="return confirm('Esta seguro que desea eliminar el registro ?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit"
                                                                    rel="tooltip">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </form> -->


                                                            </td>
                                                        @endcan
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <p>
                                                                            
                                        {{--  @can('desacarga') --}}
                                            <div class="col-md-6 mt-5">
                                                <form action="{{route('phoenix.excel')}}" method="GET">
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
                                    {{ $phoenixes->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
