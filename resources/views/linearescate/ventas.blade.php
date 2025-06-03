@extends('layouts.main', ['activePage' => 'linearescate', 'titlePage' => 'Línea de Rescate'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

                {{-- Mensaje de éxito --}}
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
                @endif

                {{-- Tarjeta principal --}}
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Listado de Registros - Línea de Rescate</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered align-middle">
                                <thead class="table-info text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Motorizado</th>
                                        <th>Cédula</th>
                                        <th>Transportadora</th>
                                        <th>Línea Titular</th>
                                        <th>Tipificación</th>
                                        <th>Subtipificación</th>
                                        <th>Asesor</th>
                                        <th>Fecha y Hora de Venta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($linearescate as $registro)
                                    <tr>
                                        <td class="text-center">{{ $registro->id }}</td>
                                        <td>{{ $registro->nombreMotorizado }}</td>
                                        <td>{{ $registro->cedulaMotorizado }}</td>
                                        <td>{{ $registro->transportadora }}</td>
                                        <td>{{ $registro->lineaTitular }}</td>
                                        <td>{{ $registro->tipificacion }}</td>
                                        <td>{{ $registro->SubTipificacion }}</td>
                                        <td>{{ $registro->agente }}</td>
                                        <td>{{ \Carbon\Carbon::parse($registro->created_at)->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> {{-- end card-body --}}
                    {{-- @can('desacarga') --}}
                    <div class="col-md-6 mt-5">
                        <form action="{{route('exportlinres.excel')}}">
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
                </div> {{-- end card --}}
                {{-- Paginacion --}}
                <div class="card-footer mr-auto">
                    {{ $linearescate->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

