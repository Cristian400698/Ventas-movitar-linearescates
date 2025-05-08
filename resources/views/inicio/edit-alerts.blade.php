@extends('layouts.main', ['activePage' => 'porta', 'titlePage' => 'Portabilidad'])
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
                                    <form action="/searchalerts" method="GET">
                                        <div class="input-group">
                                            <input type="searchuser" name="texto" class="form-control" autofocus>
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
                                            @can('alerts-index')
                                                <a href="{{ route('inicio.create') }}" class="btn btn-sm btn-facebook">Añadir
                                                    Alerta</a>
                                            @endcan
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-right">Eliminar</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($alertas as $alerta)
                                               <tr>
                                                <td>{{$alerta->id}}</td>
                                                <td class="text-center">
                                                   <form action="{{route('inicio.update',$alerta->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                  {{--   <textarea  style="width: 100%; border: 0px" rows="5" >
                                                        {{$alerta->descripcion}}
                                                    </textarea> --}}
                                                    <input type="text" name="descripcion" id="" style="width: 100%; border: 0px;" value="{{$alerta->descripcion}}">
                                                   </form>
                                                </td>
                                               <td class="text-right">
                                                <form action="{{route('inicio.destroy', $alerta->id)}}" method="post" onsubmit="return confirm('Seguro?')"> 
                                                    @csrf()
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" >Eliminar</button>
                                                </form>
                                               </td>
                                               </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer mr-auto">
                                 -  {{ $alertas->links() }} 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
