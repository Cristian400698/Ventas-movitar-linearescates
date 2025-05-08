@extends('layouts.main', ['activePage' => 'tenten', 'titlePage' => 'PERDIDAS TENTEN PORTABILIDAD'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros:  {{ $tentenprepo->total() }}</h6>
                        <div class="card">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                            {{ session('success') }}
                            </div>
                            @endif
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
                                            <th>Numero de contacto</th>
                                            <th>Revision</th>
                                            <th>Causal</th>
                                            <th>Asesor</th>
                                            <th>Fecha y hora de venta</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($tentenprepo as $tentenprepos)
                                                <tr style="text-align: center">
                                                    <td>{{$tentenprepos->id}}</td>
                                                    <td>{{$tentenprepos->numero}}</td>
                                                    <td>{{$tentenprepos->documento}}</td>
                                                    <td>{{$tentenprepos->nombres}} {{$tentenprepos->apellidos}}</td>
                                                    <td>{{ $tentenprepos->tipocliente }}</td>
                                                    <td>{{ $tentenprepos->planadquiere }}</td>                                             
                                                    <td>{{ $tentenprepos->ncontacto }}</td>
                                                    <td>{{ $tentenprepos->revisados }}</td>
                                                    <td>{{ $tentenprepos->estadorevisado }}</td>
                                                    <td>{{ $tentenprepos->agente }}</td>
                                                    <td>{{ $tentenprepos->fvc }} {{$tentenprepos->hora}}</td>
                                                    <td class="td-actions text-right">

                                                        <a href="/PerdidaTentenPrepos/{{ $tentenprepos->id }}/edit"class="btn btn-info"><i
                                                                class="material-icons">edit</i></a>


                                                    

                                                    </td>
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                               {{-- @can('desacarga') --}}
                               <div class="col-md-6 mt-5">
                                <form action="{{route('tentenprepos.excel')}}">
                                    <div class="input-group">
                                        <input type="date" name="searchtentenprepos1" class="form-control">
                                        <input type="date" name="searchtentenprepos2" class="form-control">
                                        <span class="input-group-prepend">
                                            <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px"><i class="material-icons">file_download</i>Descargar</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            {{-- @endcan --}}
                            {{-- Paginacion --}}
                            <div class="card-footer mr-auto">
                                {{ $tentenprepo->links() }}  
                            </div>                                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
