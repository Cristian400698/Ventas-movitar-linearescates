@extends('layouts.main', ['activePage' => 'Plan', 'titlePage' => 'Planes'])
@section('content')    
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Cantidad de Registros: {{--  {{ $planadquieres->total() }} --}}</h6>
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Planes</h4>
                                <p class="card-category"></p>                                    
                            </div>
                            <div class="card-body">                                
                                <div class="row">
                                    
                                    <div class="col-7">
                                        @can('user_create')
                                            <a href="/planes/import" class="btn btn-sm btn-info">
                                                Subir Planes
                                            </a>
                                        @endcan
                                    </div>

                                    <div class="col-5 text-right">
                                        @can('user_create')
                                            <a href="{{ route('planes.create') }}" class="btn btn-sm btn-facebook">
                                                Añadir Nuevo Plan
                                            </a>
                                        @endcan
                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-infor">
                                            <th>ID</th>
                                            <th>Plan</th>
                                            {{-- <th class="text-right">Acciones</th> --}}
                                        </thead>
                                        <tbody>
                                            @foreach ($planadquiere as $planadquieres)
                                                <tr>
                                                    <td>{{ $planadquieres->Id_adquisicion  }}</td>
                                                    <td>{{ $planadquieres->planadquiere }}</td>

                                                   
                                                    {{-- <td class="td-actions text-right">

                                                        <a href="#"
                                                            class="btn btn-warning"><i
                                                                class="material-icons">edit</i></a>


                                                        <form action="#"
                                                            method="POST" style="display: inline-block;"
                                                            onsubmit="return confirm('Seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>

                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer mr-auto">
                                 {{ $planadquiere->links() }} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
