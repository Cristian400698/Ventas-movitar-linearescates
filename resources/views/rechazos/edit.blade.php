@extends('layouts.main', ['activePage' => 'rechazos', 'titlePage' => 'BACKOFFICE RECHAZOS'])
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">Ver Registros Rechazados</h3>
                    </center>
                    <div class="card">
                        <div class="card-body">
                            <form name="f1" action="{{ route('rechazos.update', $rechazos->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="numero_de_celular" style="color: black;">Numero de Celular</label>
                                        <input type="number" class="form-control-new" id="numero_de_celular" placeholder="Numero de Celular" name="numero_de_celular" value="{{ old('numero_de_celular', $rechazos->numero_de_celular)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nombres" style="color: black;">Nombre</label>
                                        <input type="text" class="form-control-new" id="nombres" placeholder="nombres" name="nombres" value="{{ old('nombres', $rechazos->nombres)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="documento" style="color: black;">Documento</label>
                                        <input type="number" class="form-control-new" id="documento" placeholder="documento" name="documento" value="{{ old('documento', $rechazos->documento)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="causal" style="color: black;">Causal</label>
                                        <input type="text" class="form-control-new" id="causal" placeholder="Causal" name="causal" value="{{ old('causal', $rechazos->causal)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="linea"style="color: black;">Linea</label>
                                        <input type="text" class="form-control" id="linea" placeholder="linea" name="linea" value="{{ old('linea' , $rechazos->linea)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="departamento"style="color: black;">Departamento</label>
                                        <input type="text" class="form-control-new" id="departamento" placeholder="Departamento" name="departamento" value="{{ old('departamento', $rechazos->departamento)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id_ciudad"style="color: black;">Ciudad</label>
                                        <input type="text" class="form-control-new" id="id_ciudad" placeholder="Ciudad" name="id_ciudad" value="{{ old('id_ciudad', $rechazos->id_ciudad)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="claro"style="color: black;">Claro</label>
                                        <input type="text" class="form-control-new" id="claro" name="claro" value="{{ old('claro', $rechazos->claro)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="tigo"style="color: black;">Tigo</label>
                                        <input type="text" class="form-control-new" id="tigo" name="tigo" value="{{ old('tigo', $rechazos->tigo)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="directv"style="color: black;">Direct tv</label>
                                        <input type="text" class="form-control-new" id="directv" name="directv" value="{{ old('directv', $rechazos->directv)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="wow"style="color: black;">Wow</label>
                                        <input type="text" class="form-control-new" id="wow" name="wow" value="{{ old('wow', $rechazos->wow)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="barrio"style="color: black;">S. de Barrio</label>
                                        <input type="text" class="form-control-new" id="barrio" name="barrio" value="{{ old('barrio', $rechazos->barrio)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="otro"style="color: black;">Otro</label>
                                        <input type="text" class="form-control-new" id="otro" name="otro" value="{{ old('otro', $rechazos->otros)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="modalidad"style="color: black;">Modalidad</label>
                                        <input type="text" class="form-control-new" id="modalidad" placeholder="Modalidad" name="modalidad" value="{{ old('modalidad', $rechazos->modalidad)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="frechazo"style="color: black;">fecha rechazo</label>
                                        <input type="date" class="form-control-new" id="frechazo" placeholder="fecha rechazo" name="frechazo" value="{{ old('frechazo', $rechazos->frechazo)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="observacion"style="color: black;">Observacion</label>
                                        <input type="text" class="form-control-new" id="observacion" placeholder="observacion" name="observacion" value="{{ old('observacion', $rechazos->observacion)}}"style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="imgrechazo"style="color: black;">Imagen del Rechazo</label>
                                        <span>
                                            <a href="{{ asset('/storage').'/'.$rechazos->imgrechazo}}"><img src="{{ asset('/storage').'/'.$rechazos->imgrechazo}}" alt="" height="130" width="260"style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                </div>
                                <input class="btn btn-info btn-sm" type="submit" value="EDITAR" style="border-radius: 10px" onclick="md.showNotification('top','right')">
                                <a href="{{route('rechazos.index')}}" class="btn btn-danger btn-sm" role="button" aria-pressed="true" style="border-radius: 10px">VOLVER</a>
                            </form>
                                                   
                        </div>
                        <script src="{{asset('js/app.js')}}"></script>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function showNotification(from, align){

        $.notify({
            icon: "add_alert",
            message: "Formulario editado correctamente"

        },{
            type: 'success',
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
        }
     </script>
@endsection
