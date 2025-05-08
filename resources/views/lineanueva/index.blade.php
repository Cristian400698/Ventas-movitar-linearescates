@extends('layouts.main', ['activePage' => 'linea nueva', 'titlePage' => 'BACKOFFICE LINEA NUEVA'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $lineanueva->total() }}</h6>
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <form action="/searchlineanueva" method="GET">
                                        <div class="input-group">
                                            <input type="searc" name="searchlineanueva" class="form-control">
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
                                                <th>Numero de contacto</th>
                                                <th>Revision</th>
                                                <th>Causal</th>
                                                <th>Asesor</th>
                                                <th>Fecha y hora de venta</th>
                                                <th>Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($lineanueva as $lineanuevas)
                                                    <tr>
                                                        <td>{{ $lineanuevas->numero }}</td>
                                                        <td>{{ $lineanuevas->documento }}</td>
                                                        <td>{{ $lineanuevas->nombres }} {{ $lineanuevas->apellidos }}</td>
                                                        <td>{{ $lineanuevas->tipocliente }}</td>
                                                        <td>{{ $lineanuevas->ncontacto }}</td>
                                                        <td>{{ $lineanuevas->revisados }}</td>
                                                        <td>{{ $lineanuevas->estadorevisado }}</td>
                                                        <td>{{ $lineanuevas->agente }}</td>
                                                        <td>{{ $lineanuevas->dia }} {{$lineanuevas->hora}}</td>
                                                        <td class="td-actions text-right">

                                                            <a href="/lineanueva/{{ $lineanuevas->id }}/edit"class="btn btn-info"><i
                                                                    class="material-icons">edit</i></a>
    
    
                                                            <form action="{{ route('lineanueva.destroy',$lineanuevas->id) }}"
                                                                method="POST" style="display: inline-block;"
                                                                onsubmit="return confirm('Esta seguro que desea eliminar el registro ?')">
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
                                        <p>
                                    
                                            {{--  @can('desacarga') --}}
                                             <form action="{{route('lineanueva.excel')}}">
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
                                    {{ $lineanueva->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
