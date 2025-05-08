@extends('layouts.main', ['activePage' => 'Upgrade', 'titlePage' => 'PERDIDAS UPGRADE INBOUND'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros:  {{ $upgradeinbo->total() }}</h6>
                        <div class="card">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                            {{ session('success') }}
                            </div>
                            @endif
                            <div class="col-md-6">
                                <form action="/searchinboundperdidaupgrade" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="searchinboundperdidaupgrade" class="form-control">
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
                                            <th>Numero</th>
                                            <th>Documento</th>
                                            <th>Nombres y Apellidos</th>
                                            <th>Correo</th>
                                            <th>Plan venta</th>
                                            <th>segmento</th>            
                                            <th>Revision</th>
                                            <th>Causal</th>
                                            <th>Asesor</th>
                                            <th>Fecha y hora de venta</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($upgradeinbo as $upgradeinbos)
                                                <tr style="text-align: center">
                                                    <td>{{$upgradeinbos->numero}}</td>
                                                    <td>{{$upgradeinbos->documento}}</td>
                                                    <td>{{$upgradeinbos->nombres}}</td>
                                                    <td>{{ $upgradeinbos->correo }}</td>
                                                    <td>{{ $upgradeinbos->planventa }}</td>
                                                    <td>{{ $upgradeinbos->segmento }}</td>    
                                                    <td>{{ $upgradeinbos->revisados }}</td>
                                                    <td>{{ $upgradeinbos->estadorevisado }}</td>
                                                    <td>{{ $upgradeinbos->agente }}</td>
                                                    <td>{{ $upgradeinbos->fventa }} {{$upgradeinbos->hora}}</td>
                                                    <td class="td-actions text-right">

                                                        <a href="/perdidaupgradeinbound/{{ $upgradeinbos->id }}/edit"class="btn btn-info"><i
                                                                class="material-icons">edit</i></a>


                                                   <!--      <form action="{{ route('perdidaupgradeinbound.destroy',$upgradeinbos->id) }}"
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
                                            <form action="{{route('upgradeinbound.excel')}}" method="GET">
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
                               {{ $upgradeinbo->links() }} 
                            </div>                                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
