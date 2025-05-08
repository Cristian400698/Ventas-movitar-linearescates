@extends('layouts.main', ['activePage' => 'Fija', 'titlePage' => 'BACKOFFICE FIJA INBOUND'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $fijainbound->total() }}</h6>
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <form action="/searchinboundfija" method="GET">
                                        <div class="input-group">
                                            <input type="search" name="searchinboundfija" class="form-control">
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
                                                <th>Numero de contacto</th>
                                                <th>Nombres</th>
                                                <th>Documento</th>
                                                <th>Correo</th>
                                                <th>Producto</th>
                                                <th>Revision</th>
                                                <th>Causales</th>
                                                 <th>Agente</th>
                                                 <th>Fecha y hora de venta</th>
                                                 <th>Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($fijainbound as $fijainbounds)
                                                    <tr>
                                                        <td>{{ $fijainbounds->ncontacto }}</td>
                                                        <td>{{ $fijainbounds->nombres }}</td>
                                                        <td>{{ $fijainbounds->documento }}</td>
                                                        <td>{{ $fijainbounds->correo }}</td>
                                                        <td>{{ $fijainbounds->producto }}</td>
                                                        <td>{{ $fijainbounds->revisados }}</td>
                                                        <td>{{ $fijainbounds->estadorevisado }}</td>
                                                        <td>{{ $fijainbounds->agente }}</td>
                                                        <td>{{ $fijainbounds->dia }} {{$fijainbounds->hora}}</td>
                                                        <td class="td-actions text-right">

                                                            <a href="/fijainbound/{{ $fijainbounds->id }}/edit"class="btn btn-info"><i
                                                                    class="material-icons">edit</i></a>
    
    
                                                            <form action="{{ route('fijainbound.destroy',$fijainbounds->id) }}"
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
                                            <div class="col-md-6 mt-5">
                                             <form action="{{route('fijainbound.excel')}}">
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
                                    {{ $fijainbound->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
