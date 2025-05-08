@extends('layouts.main', ['activePage' => 'Historial', 'titlePage' => 'REGISTRO DE ACCIONES'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-info">
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Cedula</th>
                                                <th>Ultima Conexión</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->cedula }}</td>
                                                        <td>{{ $user->last_login }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                    {{-- {{ $users->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
