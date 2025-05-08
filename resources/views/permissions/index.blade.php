@extends('layouts.main', ['activePage' => 'Permissions', 'titlePage' => __('Permisos')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">Permisos</h4>
                                    <p class="card-category">Permisos registrados</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            @can('permission_create')
                                                <a href="{{ route('permissions.create') }}"
                                                    class="btn btn-sm btn-facebook">Añadir permiso</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table" style="text-align: center">
                                            <thead class="text-info">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Guard</th>
                                                <th>Fecha de creación</th>
                                                <th class="text-rigth">Acciones</th>
                                            </thead>
                                            <tbody>
                                                @forelse ($permissions as $permission)
                                                    <tr>
                                                        <td>{{ $permission->id }}</td>
                                                        <td>{{ $permission->name }}</td>
                                                        <td>{{ $permission->guard_name }}</td>
                                                        <td>{{ $permission->created_at }}</td>
                                                        <td class="td-actions text-right">
                                                            @can('permission_edit')
                                                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                                                    class="btn btn-warning"><i
                                                                        class="material-icons">edit</i></a>
                                                            @endcan
                                                            @can('permission_destroy')
                                                                <form
                                                                    action="{{ route('permissions.destroy', $permission->id) }}"
                                                                    method="POST" style="display: inline-block;"
                                                                    onsubmit="return confirm('Desea eliminar este usuario de forma permanente?')">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                        <i class="material-icons">close</i>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @empty
                                                    No tine datos
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                    {{ $permissions->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
