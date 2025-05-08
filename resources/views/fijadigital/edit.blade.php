@extends('layouts.main', ['activePage' => 'Fija', 'titlePage' => 'BACKOFFICE FIJA DIGITAL'])
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">Editar Gestion Fija</h3>
                    </center>
                    <div class="card">
                        <div class="card-body">
                            <form name="f1" action="{{ route('fijadigital.update', $fijas->id) }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="backoffice" name="backoffice" value="{{ Auth::user()->cedula }}">
                                <input type="hidden" id="selector" name="selector" value="{{old('selector', $fijas->selector)}}">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="nombres" style="color: black;">Nombres</label>
                                        <input type="text" class="form-control-new" id="nombres" placeholder="Nombres"
                                            name="nombres" value="{{ old('nombres', $fijas->nombres) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="documento" style="color: black;">Documento</label>
                                        <input type="number" class="form-control-new" id="documento"
                                            placeholder="Documento" name="documento"
                                            value="{{ old('documento', $fijas->documento) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="fexpedicion" style="color: black;">Fecha de expedicion</label>
                                        <input type="date" class="form-control-new" id="fexpedicion"
                                            placeholder="Fecha de expedicion" name="fexpedicion"
                                            value="{{ old('fexpedicion', $fijas->fexpedicion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="correo" style="color: black;">Correo Electronico</label>
                                        <input type="text" class="form-control-new" id="correo" placeholder="Correo"
                                            name="correo" value="{{ old('correo', $fijas->correo) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="departamento" style="color: black;">Departamento</label>
                                        <input type="text" class="form-control-new" id="departamento"
                                            placeholder="Departamento" name="departamento"
                                            value="{{ old('departamento', $fijas->departamento) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ciudad" style="color: black;">Ciudad</label>
                                        <input type="text" class="form-control-new" id="id_ciudad" placeholder="ciudad"
                                            name="id_ciudad" value="{{ old('id_ciudad', $fijas->id_ciudad) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="barrio" style="color: black;">Barrio</label>
                                        <input type="text" class="form-control-new" id="barrio" placeholder="barrio"
                                            name="barrio" value="{{ old('barrio', $fijas->barrio) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="direccion" style="color: black;">Direccion</label>
                                        <input type="text" class="form-control-new" id="direccion"
                                            placeholder="direccion" name="direccion"
                                            value="{{ old('direccion', $fijas->direccion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="estrato" style="color: black;">Estrato</label>
                                        <input type="number" class="form-control-new" id="estrato"
                                            placeholder="Estrato" name="estrato"
                                            value="{{ old('estrato', $fijas->estrato) }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ngrabacion" style="color: black;">Numero de grabacion</label>
                                        <input type="number" class="form-control-new" id="ngrabacion"
                                            placeholder="Numero de grabacion" name="ngrabacion"
                                            value="{{ old('ngrabacion', $fijas->ngrabacion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ncontacto" style="color: black;">Numero de contacto</label>
                                        <input type="number" class="form-control-new" id="ncontacto"
                                            placeholder="Numero de contacto" name="ncontacto"
                                            value="{{ old('ncontacto', $fijas->ncontacto) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="producto" style="color: black;">Producto</label>
                                        <input type="text" class="form-control-new" id="producto"
                                            placeholder="Producto" name="producto"
                                            value="{{ old('producto', $fijas->producto) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="container">
                                        <div class="row" style="text-align:center">
                                            <div class="col col-lg-1">
                                                <label for="fox" style="color: black;">Fox</label>
                                                <input type="text" class="form-control-new" id="fox"
                                                    placeholder="0" name="fox" value="{{ old('fox', $fijas->FOX) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                            <div class="col col-lg-1">
                                                <label for="hbo" style="color: black;">Hbo</label>
                                                <input type="text" class="form-control-new" id="hbo"
                                                    placeholder="0" name="hbo" value="{{ old('hbo', $fijas->HBO) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                            <div class="col col-lg-1">
                                                <label for="cds_movil" style="color: black;">Cds movil</label>
                                                <input type="text" class="form-control-new" id="cds_movil"
                                                    placeholder="0" name="cds_movil"
                                                    value="{{ old('cds_movil', $fijas->cds_movil) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                            <div class="col col-lg-1">
                                                <label for="cds_fija" style="color: black;">Cds fija</label><input
                                                    type="text" class="form-control-new" id="cds_fija"
                                                    placeholder="0" name="cds_fija"
                                                    value="{{ old('cds_fija', $fijas->cds_fija) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                            <div class="col col-lg-1">
                                                <label for="Paquete_Adultos" style="color: black;">P adultos</label>
                                                <input type="text" class="form-control-new" id="Paquete_Adultos"
                                                    placeholder="0" name="Paquete_Adultos"
                                                    value="{{ old('deco', $fijas->Paquete_Adultos) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                            <div class="col col-lg-1">
                                                <label for="Decodificador" style="color: black;">Deco</label>
                                                <input type="text" class="form-control-new" id="Decodificador"
                                                    placeholder="0" name="Decodificador"
                                                    value="{{ old('Decodificador', $fijas->Decodificador) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                            <div class="col col-lg-1">
                                                <label for="svas_lineas" style="color: black;">Svas l.</label>
                                                <input type="text" class="form-control-new" id="svas_lineas"
                                                    placeholder="0" name="svas_lineas"
                                                    value="{{ old('svas_lineas', $fijas->Svas_lineas) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label for="velocidad" style="color: black;">Velocidad</label>
                                                <input type="text" class="form-control-new" id="velocidad"
                                                    placeholder="Velocidad" name="velocidad"
                                                    value="{{ old('velocidad', $fijas->velocidad) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="tecnologia" style="color: black;">Tecnologia</label>
                                                <input type="text" class="form-control-new" id="tecnologia"
                                                    placeholder="Tecnologia" name="tecnologia"
                                                    value="{{ old('tecnologia', $fijas->tecnologia) }}"
                                                    style="border-radius: 10px">
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div class="form-group col-md-6">
                                        <label for="orden" style="color: black;">Numero de Orden</label>
                                        <input type="text" class="form-control-new" id="orden"
                                            placeholder="orden" name="orden" value="{{ old('orden', $fijas->orden) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="observacion" style="color: black;">Observacion</label>
                                        <input type="text" class="form-control-new" id="observacion"
                                            placeholder="observacion" name="observacion"
                                            value="{{ old('observacion', $fijas->observacion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Estado</label>
                                        <select name="revisados" id="revisados" class="form-control"
                                            style="border-radius: 10px;margin-top:-10px" required>
                                            </section>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input hidden>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Sub Estado</label>
                                        <select name="estadorevisado" id="estadorevisado" class="form-control"
                                            style="border-radius: 10px;margin-top:-10px" required>
                                            </section>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input hidden>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span><label for="confronta" style="color: black;">Confronta</label><br>
                                            <a href="{{ asset('storage') . '/' . $fijas->confronta }}"><img
                                                    src="{{ asset('storage') . '/' . $fijas->confronta }}" alt=""
                                                    height="130" width="300" style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span><label for="likewize" style="color: black;">likewize</label><br>
                                            <a href="{{ asset('storage') . '/' . $fijas->likewize }}"><img
                                                    src="{{ asset('storage') . '/' . $fijas->likewize }}" alt=""
                                                    height="130" width="300" style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span><label for="ley2300" style="color: black;">ley2300</label><br>
                                            <a href="{{ asset('storage') . '/' . $fijas->ley2300 }}"><img
                                                    src="{{ asset('storage') . '/' . $fijas->ley2300 }}" alt=""
                                                    height="130" width="300" style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control-new" id="obs2" name="obs2" rows="3"
                                            placeholder="Observaciones BackOficce"></textarea>
                                    </div>
                                </div>
                                <input class="btn btn-lg btn-info btn-sm" type="submit" value="Enviar"
                                    style="border-radius: 10px" onclick="md.showNotification('top','right')">
                        </div>
                        </form>
                    </div>
                    <script src="{{ asset('js/app.js') }}"></script>
                </div>
            </div>
            </form>
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
        </div>
    </div>
    <script>
        function showNotification(from, align) {

            $.notify({
                icon: "add_alert",
                message: "Formulario editado correctamente"

            }, {
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
