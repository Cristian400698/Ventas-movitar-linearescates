@extends('layouts.main', ['activePage' => 'marketing', 'titlePage' => 'Marketing'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Cantidad de Registros: {{ $fijadigital->total() }}</h6>
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success" role="success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <form action="/searchmarkfijaperdida" method="GET">
                                        <div class="input-group">
                                            <input type="search" name="searchmarkfijaperdida" class="form-control">
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
                                                @foreach ($fijadigital as $fijadigitals)
                                                    <tr>
                                                        <td>{{ $fijadigitals->ncontacto }}</td>
                                                        <td>{{ $fijadigitals->nombres }}</td>
                                                        <td>{{ $fijadigitals->documento }}</td>
                                                        <td>{{ $fijadigitals->correo }}</td>
                                                        <td>{{ $fijadigitals->producto }}</td>
                                                        <td>{{ $fijadigitals->revisados }}</td>
                                                        <td>{{ $fijadigitals->estadorevisado }}</td>
                                                        <td>{{ $fijadigitals->agente }}</td>
                                                        <td>{{ $fijadigitals->dia }} {{$fijadigitals->hora}}</td>
                                                        <td class="td-actions text-right">

                                                            <a href="/markefija/{{ $fijadigitals->id }}/edit"class="btn btn-info"><i
                                                                    class="material-icons">edit</i></a>
    
    
                                                            <form action="{{ route('markefija.destroy',$fijadigitals->id) }}"
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
                                     {{--    <p>
                                    
                                           
                                            <div class="col-md-6 mt-5">
                                             <form action="{{route('fijadigital.excel')}}">
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
                                            
                                     </p> --}}
                                    </div>
                                </div>
                                {{-- Paginacion --}}
                                <div class="card-footer mr-auto">
                                    {{ $fijadigital->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
