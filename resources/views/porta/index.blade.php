@extends('layouts.main', ['activePage' => 'porta', 'titlePage' => 'BACKOFFICE PORTABILIDAD INBOUND'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros:  {{ $portainbound->total() }}</h6>
                        <div class="card">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                            {{ session('success') }}
                            </div>
                            @endif
                            <div class="col-md-6">
                                <form action="/searchinboundback" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="searchinboundback" class="form-control">
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
                                            @foreach ($portainbound as $portainbounds)
                                                <tr style="text-align: center">
                                                    <td>{{$portainbounds->id}}</td>
                                                    <td>{{$portainbounds->numero}}</td>
                                                    <td>{{$portainbounds->documento}}</td>
                                                    <td>{{$portainbounds->nombres}} {{$portainbounds->apellidos}}</td>
                                                    <td>{{ $portainbounds->tipocliente }}</td>
                                                    <td>{{ $portainbounds->planadquiere }}</td>
                                                    <td>{{ $portainbounds->segmento }}</td>                                                
                                                    <td>{{ $portainbounds->ncontacto }}</td>
                                                    <td>{{ $portainbounds->revisados }}</td>
                                                    <td>{{ $portainbounds->estadorevisado }}</td>
                                                    <td>{{ $portainbounds->agente }}</td>
                                                    <td>{{ $portainbounds->dia }} {{$portainbounds->hora}}</td>
                                                    <td class="td-actions text-right">

                                                        <a href="/porta/{{ $portainbounds->id }}/edit"class="btn btn-info"><i
                                                                class="material-icons">edit</i></a>


                                                        <form action="{{ route('porta.destroy',$portainbounds->id) }}"
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
                                      {{-- boton dedescarga --}}
                                <p>
                                    
                                    {{--  @can('desacarga') --}}
                                    <div class="col-md-6 mt-5">
                                     <form action="{{route('portainbound.excel')}}">
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
                                {{-- {{ $movil->links() }}   --}}
                            </div>                                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
