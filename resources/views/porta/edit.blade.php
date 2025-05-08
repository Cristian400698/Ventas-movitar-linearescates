@extends('layouts.main', ['activePage' => 'porta', 'titlePage' => 'BACKOFFICE PORTABILIDAD INBOUND'])
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">Editar Gestion de Portabilidad</h3>
                    </center>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form name="f1" action="{{ route('porta.update', $portainbound->id) }}" method="POST"
                                    enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" id="backoffice" name="backoffice"
                                        value="{{ Auth::user()->cedula }}">
                                    <div class="form-row">
                                        <input type="hidden" name="agente" id="agente" value="{{ old('numero', $portainbound->agente) }}">
                                        <input type="hidden" name="segmento" id="segmento" value="{{ old('numero', $portainbound->segmento) }}">
                                        <div class="form-group col-md-6">
                                            <label for="number" style="color: black;">Numero</label>
                                            <input type="number" class="form-control-new" id="numero"
                                                placeholder="Numero" name="numero"
                                                value="{{ old('numero', $portainbound->numero) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="documento" style="color: black">Documento</label>
                                            <input type="number" class="form-control-new" id="documento"
                                                placeholder="Documento" name="documento"
                                                value="{{ old('documento', $portainbound->documento) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nombres" style="color: black">Nombres</label>
                                            <input type="text" class="form-control-new" id="nombres"
                                                placeholder="Nombres" name="nombres"
                                                value="{{ old('nombres', $portainbound->nombres) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidos" style="color: black">Apellidos</label>
                                            <input type="text" class="form-control-new" id="apellidos"
                                                placeholder="Apellidos" name="apellidos"
                                                value="{{ old('apellidos', $portainbound->apellidos) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="correo" style="color: black">Correo</label>
                                            <input type="text" class="form-control-new" id="correo"
                                                placeholder="Correo" name="correo"
                                                value="{{ old('correo', $portainbound->correo) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="selector" style="color: black">Selector</label>
                                            <input type="text" class="form-control-new" id="selector"
                                                placeholder="Selector" name="selector"
                                                value="{{ old('selector', $portainbound->selector) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="departamento" style="color: black">Departamento</label>
                                            <input type="text" class="form-control-new" id="departamento"
                                                placeholder="Departamento" name="departamento"
                                                value="{{ old('departamento', $portainbound->departamento) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="id_ciudad" style="color: black">Ciudad</label>
                                            <input type="text" class="form-control-new" id="id_ciudad"
                                                placeholder="ciudad" name="id_ciudad"
                                                value="{{ old('id_ciudad', $portainbound->id_ciudad) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="barrio" style="color: black">Barrio</label>
                                            <input type="text" class="form-control-new" id="barrio"
                                                placeholder="barrio" name="barrio" value="{{ $portainbound->barrio }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="direccion" style="color: black">Direccion</label>
                                            <input type="text" class="form-control-new" id="direccion"
                                                placeholder="direccion" name="direccion"
                                                value="{{ old('direccion', $portainbound->direccion) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nip" style="color: black">Nip</label>
                                            <input type="number" class="form-control-new" id="nip"
                                                placeholder="Nip" name="nip"
                                                value="{{ old('nip', $portainbound->nip) }}" style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tipocliente" style="color: black">Tipo cliente</label>
                                            <input type="text" class="form-control-new" id="tipocliente"
                                                placeholder="tipo cliente" name="tipocliente"
                                                value="{{ old('tipocliente', $portainbound->tipocliente) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="planadquiere" style="color: black">Plan adquiere</label>
                                            <input type="number" class="form-control-new" id="planadquiere"
                                                placeholder="plan adquiere" name="planadquiere"
                                                value="{{ old('planadquiere', $portainbound->planadquiere) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ncontacto" style="color: black">Numero de contacto</label>
                                            <input type="number" class="form-control-new" id="ncontacto"
                                                placeholder="numero de contacto" name="ncontacto"
                                                value="{{ old('ncontacto', $portainbound->ncontacto) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="imei" style="color: black;">Imei</label>
                                            <input type="number" class="form-control-new" id="imei"
                                                placeholder="Imei" name="imei"
                                                value="{{ old('imei', $portainbound->imei) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ngrabacion" style="color: black;">Numero de grabacion</label>
                                            <input type="number" class="form-control-new" id="ngrabacion"
                                                placeholder="Numero de grabacion" name="ngrabacion"
                                                value="{{ old('ngrabacion', $portainbound->ngrabacion) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="fvc" style="color: black;">FVC</label>
                                            <input type="date" class="form-control-new" id="fvc"
                                                placeholder="fvc" name="fvc"
                                                value="{{ old('fvc', $portainbound->fvc) }}" style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="fentrega" style="color: black;">Fecha de entrega</label>
                                            <input type="date" class="form-control-new" id="fentrega"
                                                placeholder="Fecha de entrega" name="fentrega"
                                                value="{{ old('fentrega', $portainbound->fentrega) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="fexpedicion" style="color: black;">Fecha de expedicion</label>
                                            <input type="date" class="form-control-new" id="fexpedicion"
                                                placeholder="Fecha de expedicion" name="fexpedicion"
                                                value="{{ old('fexpedicion', $portainbound->fexpedicion) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="fnacimiento" style="color: black;">Fecha de nacimiento</label>
                                            <input type="date" class="form-control-new" id="fnacimiento"
                                                placeholder="Fecha de nacimiento" name="fnacimiento"
                                                value="{{ old('fnacimiento', $portainbound->fnacimiento) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="origen" style="color: black;">Origen de la migracion</label>
                                            <input type="text" class="form-control-new" id="origen"
                                                placeholder="Origen" name="origen"
                                                value="{{ old('origen', $portainbound->origen) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="orden" style="color: black;">Numero de Orden</label>
                                            <input type="number" class="form-control-new" id="orden"
                                                placeholder="Numero de Orden" name="orden"
                                                value="{{ old('orden', $portainbound->orden) }}"
                                                style="border-radius: 10px">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="ngrabacion" style="color: black;">Observaciones</label>
                                            <input type="text" class="form-control-new" id="observaciones"
                                                name="observaciones" placeholder="Observaciones"
                                                value="{{ old('observaciones', $portainbound->observaciones) }}"
                                                style="border-radius: 10px">
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
                                        
                                        <input type="hidden" name="confronta" id="confronta" value="{{ old('numero', $portainbound->confronta) }}">
                                        <div class="form-group col-md-4">
                                            <span><label for="confronta" style="color: black;">Confronta</label><br>
                                                <a href="{{ asset('storage') . '/' . $portainbound->confronta }}"><img
                                                        src="{{ asset('storage') . '/' . $portainbound->confronta }}"
                                                        alt="" height="130" width="300"
                                                        style="border-radius: 10px"></a>
                                            </span>
                                        </div>

                                        <input type="hidden" name="likewize" id="likewize" value="{{ old('numero', $portainbound->likewize) }}">
                                        <div class="form-group col-md-4">
                                            <span><label for="likewize" style="color: black;">likewize</label><br>
                                                <a href="{{ asset('storage') . '/' . $portainbound->likewize }}"><img
                                                        src="{{ asset('storage') . '/' . $portainbound->likewize }}"
                                                        alt="" height="130" width="300"
                                                        style="border-radius: 10px"></a>
                                            </span>
                                        </div>

                                        <input type="hidden" name="ley2300" id="ley2300" value="{{ old('numero', $portainbound->ley2300) }}">
                                        <div class="form-group col-md-4">
                                            <span><label for="ley2300" style="color: black;">Ley 2300</label><br>
                                                <a href="{{ asset('storage') . '/' . $portainbound->ley2300 }}"><img
                                                        src="{{ asset('storage') . '/' . $portainbound->ley2300 }}"
                                                        alt="" height="130" width="300"
                                                        style="border-radius: 10px"></a>
                                            </span>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <textarea class="form-control-new" id="obs2" name="obs2" rows="3"
                                                placeholder="Observaciones BackOficce" style="border-radius: 10px"></textarea>
                                        </div>
                                        <input class="btn btn-info btn-sm" type="submit" value="Enviar"
                                            style="border-radius: 10px; margin-left:20px"
                                            onclick="md.showNotification('top','right')">

                                    </div>
                                </form>
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
