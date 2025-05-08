@extends('layouts.main', ['activePage' => 'rechazos', 'titlePage' => 'BACKOFFICE RECHAZOS'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $rechazos->total() }}</h6>
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <form action="/searchbackoffice" method="GET">
                                        <div class="input-group">
                                            <input type="searchbackoffice" name="searchbackoffice" class="form-control">
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
                                                <th scope="col">#</th>
                                                <th scope="col">Numero</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Documento</th>
                                                <th scope="col">Causal</th>
                                                <th scope="col">Linea</th>
                                                <th scope="col">Fecha rechazo</th>
                                                <th scope="col">Modalidad</th>
                                                <th scope="col">Agente</th>
                                                <th colspan="3">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($rechazos as $rechazo)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $rechazo->numero_de_celular }}</td>
                                                        <td>{{ $rechazo->nombres }}</td>
                                                        <td>{{ $rechazo->documento }}</td>
                                                        <td>{{ $rechazo->causal }}</td>
                                                        <td>{{ $rechazo->linea }}</td>
                                                        <td>{{ $rechazo->frechazo }}</td>
                                                        <td>{{ $rechazo->modalidad }}</td>
                                                        <td>{{ $rechazo->agente }}</td>
                                                        
                                                            <td class="td-actions text-right">
                                                                <a
                                                                    href="/rechazos/{{ $rechazo->id }}/edit"class="btn btn-info"><i
                                                                        class="material-icons">edit</i></a>

                                                                <form action="{{ route('rechazos.destroy', $rechazo->id) }}"
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
                                             <form action="{{route('rechazo.excel')}}">
                                                 <input type="hidden" name="date1" id="" value="1">
                                                 <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px"><i
                                                     class="material-icons">file_download</i>Descargar</button>
                                             </form>
                                             {{-- @endcan --}}
                                     </p>
                                    </div>
                                </div>
                                {{-- Paginacion --}}
                                <div class="card-footer mr-auto">
                                    {{ $rechazos->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
