@extends('layouts.main', ['activePage' => 'porta', 'titlePage' => 'PERDIDAS PORTABILIDAD DIGITAL'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros:  {{ $comunidad->total() }}</h6>
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
                                            <th>segmento</th>                                            
                                            <th>Numero de contacto</th>
                                            <th>Revision</th>
                                            <th>Causal</th>
                                            <th>Asesor</th>
                                            <th>Fecha y hora de venta</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($comunidad as $comunidads)
                                                <tr style="text-align: center">
                                                    <td>{{$comunidads->id}}</td>
                                                    <td>{{$comunidads->numero}}</td>
                                                    <td>{{$comunidads->documento}}</td>
                                                    <td>{{$comunidads->nombres}} {{$comunidads->apellidos}}</td>
                                                    <td>{{ $comunidads->tipocliente }}</td>
                                                    <td>{{ $comunidads->planadquiere }}</td>
                                                    <td>{{ $comunidads->segmento }}</td>                                                
                                                    <td>{{ $comunidads->ncontacto }}</td>
                                                    <td>{{ $comunidads->revisados }}</td>
                                                    <td>{{ $comunidads->estadorevisado }}</td>
                                                    <td>{{ $comunidads->agente }}</td>
                                                    <td>{{ $comunidads->fvc }} {{$comunidads->hora}}</td>
                                                    <td class="td-actions text-right">

                                                        <a href="/perdidacomunidad/{{ $comunidads->id }}/edit"class="btn btn-info"><i
                                                                class="material-icons">edit</i></a>


                                                    

                                                    </td>
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                            {{-- Paginacion --}}
                            <div class="card-footer mr-auto">
                                {{ $comunidad->links() }}  
                            </div>                                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
