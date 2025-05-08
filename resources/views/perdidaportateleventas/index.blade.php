@extends('layouts.main', ['activePage' => 'porta', 'titlePage' => 'PERDIDAS PORTABILIDAD TELEVENTAS'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros:  {{ $portatelev->total() }}</h6>
                        <div class="card">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                            {{ session('success') }}
                            </div>
                            @endif
                            <div class="col-md-6">
                                <form action="/searchteleventaperdida" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="searchteleventaperdida" class="form-control">
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
                                            @foreach ($portatelev as $portatelevs)
                                                <tr style="text-align: center">
                                                    <td>{{$portatelevs->id}}</td>
                                                    <td>{{$portatelevs->numero}}</td>
                                                    <td>{{$portatelevs->documento}}</td>
                                                    <td>{{$portatelevs->nombres}} {{$portatelevs->apellidos}}</td>
                                                    <td>{{ $portatelevs->tipocliente }}</td>
                                                    <td>{{ $portatelevs->planadquiere }}</td>
                                                    <td>{{ $portatelevs->segmento }}</td>                                                
                                                    <td>{{ $portatelevs->ncontacto }}</td>
                                                    <td>{{ $portatelevs->revisados }}</td>
                                                    <td>{{ $portatelevs->estadorevisado }}</td>
                                                    <td>{{ $portatelevs->agente }}</td>
                                                    <td>{{ $portatelevs->fvc }} {{$portatelevs->hora}}</td>
                                                    <td class="td-actions text-right">

                                                        <a href="/perdidaportateleventas/{{ $portatelevs->id }}/edit"class="btn btn-info"><i
                                                                class="material-icons">edit</i></a>


                                                       <!--  <form action="{{ route('perdidaportateleventas.destroy',$portatelevs->id) }}"
                                                            method="POST" style="display: inline-block;"
                                                            onsubmit="return confirm('Esta seguro que desea eliminar el registro ?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>  -->

                                                    </td>
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                            <p>
                                                                
                            {{--  @can('desacarga') --}}
                                        <div class="col-md-6 mt-5">
                                            <form action="{{route('portatelev.excel')}}" method="GET">
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
                                {{ $portatelev->links() }}  
                            </div>                                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
