@extends('layouts.main', ['activePage' => 'supervisor', 'titlePage' => 'Supervisor Personal'])
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
                                    <form action="/searchsuperpersonalindex" method="GET">
                                        <div class="input-group">
                                            <input type="searchuser" name="text" class="form-control">
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
                                    @if (session('warning'))
                                    <div class="alert alert-warning" role="warning">
                                        {{ session('warning') }}
                                    </div>
                                @endif 
                                    @if (session('danger'))
                                        <div class="alert alert-danger" role="danger">
                                            {{ session('danger') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            @can('user_create')
                                                <a href="{{ route('superpersonal.create') }}" class="btn btn-sm btn-facebook">Añadir
                                                    personal</a>
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
                                                       <td>{{ $user->updated_at }}</td>
                                                        <td class="td-actions text-right">

                                                            <form action="{{ route('superpersonal.destroy', $user->id) }}"
                                                                method="POST" style="display: inline-block;"
                                                                onsubmit="return confirm('Deseas remover esta persona ?')">
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
                                 {{--  @can('desacarga') --}}
                                 <form action="{{route('superpersonal.excel')}}">
                                    <button type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px"><i
                                        class="material-icons">file_download</i>Descargar</button>
                                </form>
                                {{-- @endcan --}}
                                <div class="card-footer mr-auto">
                                      {{ $users->links() }}  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
