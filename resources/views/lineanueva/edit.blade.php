@extends('layouts.main', ['activePage' => 'linea nueva', 'titlePage' => 'BACKOFFICE LINEA NUEVA'])
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">Editar Gestion Linea Nueva</h3>
                    </center>
                    <div class="card">
                        <div class="card-body">
                            <form name="f1" action="{{ route('lineanueva.update', $lineanuevas->id) }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="backoffice" name="backoffice"  value="{{ Auth::user()->cedula }}">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="number" style="color: black;">Numero</label>
                                        <input type="number" class="form-control-new" id="numero" placeholder="Numero"
                                            name="numero" value="{{ old('numero', $lineanuevas->numero) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="documento" style="color: black;">Documento</label>
                                        <input type="number" class="form-control-new" id="documento" placeholder="Documento"
                                            name="documento" value="{{ old('documento', $lineanuevas->documento) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nombres" style="color: black;">Nombres</label>
                                        <input type="text" class="form-control-new" id="nombres" placeholder="Nombres"
                                            name="nombres" value="{{ old('nombres', $lineanuevas->nombres) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="apellidos" style="color: black;">Apellidos</label>
                                        <input type="text" class="form-control-new" id="apellidos" placeholder="Apellidos"
                                            name="apellidos" value="{{ old('apellidos', $lineanuevas->apellidos) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="correo" style="color: black;">Correo</label>
                                        <input type="text" class="form-control-new" id="correo" placeholder="Correo"
                                            name="correo" value="{{ old('correo', $lineanuevas->correo) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="selector" style="color: black;">Selector</label>
                                        <input type="text" class="form-control-new" id="selector" placeholder="Selector"
                                            name="selector" value="{{ old('selector', $lineanuevas->selector) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="departamento" style="color: black;">Departamento</label>
                                        <input type="text" class="form-control-new" id="departamento"
                                            placeholder="Departamento" name="departamento"
                                            value="{{ old('departamento', $lineanuevas->departamento) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_ciudad" style="color: black;">Ciudad</label>
                                        <input type="text" class="form-control-new" id="id_ciudad" placeholder="ciudad"
                                            name="id_ciudad" value="{{ old('id_ciudad', $lineanuevas->id_ciudad) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="barrio" style="color: black;">Barrio</label>
                                        <input type="text" class="form-control-new" id="barrio" placeholder="barrio"
                                            name="barrio" value="{{ old('barrio', $lineanuevas->barrio) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="direccion" style="color: black;">Direccion</label>
                                        <input type="text" class="form-control-new" id="direccion" placeholder="direccion"
                                            name="direccion" value="{{ old('direccion', $lineanuevas->direccion) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tipocliente" style="color: black;">Tipo cliente</label>
                                        <input type="text" class="form-control-new" id="tipocliente"
                                            placeholder="tipo cliente" name="tipocliente"
                                            value="{{ old('tipocliente', $lineanuevas->tipocliente) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ncontacto" style="color: black;">Numero de contacto</label>
                                        <input type="number" class="form-control-new" id="ncontacto"
                                            placeholder="numero de contacto" name="ncontacto"
                                            value="{{ old('ncontacto', $lineanuevas->ncontacto) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ngrabacion" style="color: black;">Numero de grabacion</label>
                                        <input type="number" class="form-control-new" id="ngrabacion"
                                            placeholder="Numero de grabacion" name="ngrabacion"
                                            value="{{ old('ngrabacion', $lineanuevas->ngrabacion) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="orden" style="color: black;">Numero de Orden</label>
                                        <input type="number" class="form-control-new" id="orden"
                                            placeholder="Numero de Orden" name="orden"
                                            value="{{ old('orden', $lineanuevas->orden) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="ngrabacion" style="color: black;">Observaciones</label>
                                        <input type="text" class="form-control-new" id="observaciones" name="observaciones"
                                            placeholder="Observaciones"
                                            value="{{ old('observaciones', $lineanuevas->observaciones) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Estado</label>
                                        <select name="revisados" id="revisados" class="form-control" style="border-radius: 10px;margin-top:-10px" required>
                                            </section>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input hidden>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Sub Estado</label>
                                        <select name="estadorevisado" id="estadorevisado" class="form-control" style="border-radius: 10px;margin-top:-10px" required>
                                            </section>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input hidden>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span><label for="confronta" style="color: black;">Confronta</label><br>
                                            <a href="{{ asset('storage') . '/' . $lineanuevas->confronta }}"><img
                                                    src="{{ asset('storage') . '/' . $lineanuevas->confronta }}" alt=""
                                                    height="130" width="300" style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                    <input type="hidden" id="confronta" name="confronta"  value="{{$lineanuevas->confronta}}">
                                    <div class="form-group col-md-4">
                                        <span><label for="likewize" style="color: black;">likewize</label><br>
                                            <a href="{{ asset('storage') . '/' . $lineanuevas->likewize }}"><img
                                                    src="{{ asset('storage') . '/' . $lineanuevas->likewize }}" alt=""
                                                    height="130" width="300" style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                    <input type="hidden" id="likewize" name="likewize"  value="{{$lineanuevas->likewize}}">
                                    <div class="form-group col-md-4">
                                        <span><label for="ley2300" style="color: black;">ley2300</label><br>
                                            <a href="{{ asset('storage') . '/' . $lineanuevas->ley2300 }}"><img
                                                    src="{{ asset('storage') . '/' . $lineanuevas->ley2300 }}" alt=""
                                                    height="130" width="300" style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                    <input type="hidden" id="ley2300" name="ley2300"  value="{{$lineanuevas->ley2300}}">

                                    <div class="form-group col-md-12">
                                        <textarea class="form-control-new" id="obs2" name="obs2" rows="3"
                                            placeholder="Observaciones BackOficce"></textarea>
                                    </div>
                                    <input class="btn btn-info btn-sm" type="submit" value="EDITAR" style="border-radius: 10px" onclick="md.showNotification('top','right')">
                                    <a href="{{ route('lineanueva.index') }}" class="btn btn-danger btn-sm"
                                        role="button" aria-pressed="true"style="border-radius: 10px">VOLVER</a>
                                </div>
                            </form>
                            <script>
                                var estadorevisados_1 = new Array("Ok");
                                var estadorevisados_2 = new Array("Escoja una opcion", "Cliente en mora", "Error Aplicativo", "Recahzo PCO",
                                    "Cliente no Paso Confronta", "Pendiente Ingreso");
                                var estadorevisados_3 = new Array("Escoja una opcion", "Rechazo PCO", "Cliente Tiene una Solicitud Abierta");
                                var todasestadorevisados = [
                                    [],
                                    estadorevisados_1,
                                    estadorevisados_2,
                                    estadorevisados_3,
                                ];

                                function cambia_estadorevisado() {
                                    //tomo el valor del select del revisado elegido
                                    var revisado
                                    revisado = document.f1.revisado[document.f1.revisado.selectedIndex].value
                                    //miro a ver si el revisado está definido
                                    if (revisado != 0) {
                                        //si estaba definido, entonces coloco las opciones de la estadorevisado correspondiente.
                                        //selecciono el array de estadorevisado adecuado
                                        mis_estadorevisados = todasestadorevisados[revisado]
                                        //calculo el numero de estadorevisados
                                        num_estadorevisados = mis_estadorevisados.length
                                        //marco el número de estadorevisados en el select
                                        document.f1.estadorevisado.length = num_estadorevisados
                                        //para cada estadorevisado del array, la introduzco en el select
                                        for (i = 0; i < num_estadorevisados; i++) {
                                            document.f1.estadorevisado.options[i].value = mis_estadorevisados[i]
                                            document.f1.estadorevisado.options[i].text = mis_estadorevisados[i]
                                        }
                                    } else {
                                        //si no había estadorevisado seleccionada, elimino las estadorevisados del select
                                        document.f1.estadorevisado.length = 1
                                        //coloco un guión en la única opción que he dejado
                                        document.f1.estadorevisado.options[0].value = "-"
                                        document.f1.estadorevisado.options[0].text = "-"
                                    }
                                    //marco como seleccionada la opción primera de estadorevisado
                                    document.f1.estadorevisado.options[0].selected = true
                                }
                            </script>   
                        </div>
                        <script src="{{ asset('js/app.js') }}"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        let $revisados = document.getElementById('revisados')
        let $estadorevisado = document.getElementById('estadorevisado')
    
        let tp1 = ['OK',
                    'RECHAZADA',
                    'PERDIDA',
                   ]
    
    
        let tp2 = ['Aprobada','Estado fallido','ZONA DE ALTO RIESGO',
                    'Plan errado','Sin orden','Estado cancelado','PCO','Línea errada','Fuera de fecha','Sin Recarga','LikeWize',
                    'PLAN FUERA DE OFERTA','ERROR TIR','DIRECCION INVALIDA PARA ENTREGA','PUNTO 472','DIRECCION FISCAL','No cumple respeto a Ventas','Duplicada',
                    
                 ]
        
        function mostrarLugares(arreglo, lugar) {
            let elementos = '<option selected disables></option>'
    
            for (let i = 0; i < arreglo.length; i++) {
                elementos += '<option value="' + arreglo[i] + '">' + arreglo[i] + '</option>'
            }
    
            lugar.innerHTML = elementos
        }
    
        mostrarLugares(tp1, $revisados)
    
        function recortar(array, inicio, fin, lugar) {  
            let recortar = array.slice(inicio, fin)
            mostrarLugares(recortar, lugar)
        }
    
        $revisados.addEventListener('change', function () {
            let valor = $revisados.value
    
            switch (valor) {  
                case 'OK':
                    recortar(tp2, 0, 3, $estadorevisado)
                    break
                case 'RECHAZADA':
                    recortar(tp2, 3, 11, $estadorevisado)
                    break
                case 'PERDIDA':
                    recortar(tp2, 11, 18, $estadorevisado)
                    break    
            }
    
            $Tipificacion_detalle_3.innerHTML = ''
        })
    
      
    </script>
@endsection
