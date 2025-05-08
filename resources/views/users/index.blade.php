@extends('layouts.main', ['activePage' => 'usuarios', 'titlePage' => 'Usuarios'])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Usuarios</h4>
                                    <p class="card-category">Usuarios registrados</p>
                                </div>
                                <div class="col-md-6">
                                    <form action="/searchuser" method="GET">
                                        <div class="input-group">
                                            <input type="searchuser" name="searchuser" class="form-control" autofocus>
                                            <span class="input-group-prepend">
                                                <button type="submit" class="btn btn-info btn-sm" style="border-radius: 10px">Buscar por Numero</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            @can('user_create')
                                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-facebook">Añadir
                                                    usuario</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>cedula</th>
                                                <th>Username</th>
                                                <th>Roles</th>
                                                <th>Ultima Conexión</th>
                                                <th class="text-right">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->cedula }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>
                                                            @forelse ($user->roles as $role)
                                                                <span class="badge badge-info">{{ $role->name }}</span>
                                                            @empty
                                                                <span class="badge badge-danger">No roles</span>
                                                            @endforelse
                                                        </td>
                                                        <td>{{ $user->last_login }}</td>
                                                        <td class="td-actions text-right">

                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                                class="btn btn-warning"><i
                                                                    class="material-icons">edit</i></a>


                                                            <form action="{{ route('users.delete', $user->id) }}"
                                                                method="POST" style="display: inline-block;"
                                                                onsubmit="return confirm('Seguro?')">
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
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                    {{ $users->links() }}
                                </div>
                            </div>
  <a href="{{route('User.excel')}}"><button class="btn btn-info" style="border-radius: 10px"><i
                                class="material-icons">file_download</i>Descargar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
