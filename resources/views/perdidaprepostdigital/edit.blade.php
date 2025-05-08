@extends('layouts.main', ['activePage' => 'Prepost', 'titlePage' => 'PERDIDAS PREPOST DIGITAL'])
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">Editor de Gestion Prepost</h3>
                    </center>
                    <div class="card">
                        <div class="card-body">
                            <form name="f1" action="{{ url('/perdidaprepostdigital/' . $prepost->id) }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="backoffice" name="backoffice" value="{{ Auth::user()->cedula }}">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="number" style="color: black;">Numero</label>
                                        <input type="number" class="form-control-new" id="numero" placeholder="Numero"
                                            name="numero" value="{{ old('numero', $prepost->numero) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nombres" style="color: black;">Nombres</label>
                                        <input type="text" class="form-control-new" id="nombres" placeholder="Nombres"
                                            name="nombres" value="{{ old('nombres', $prepost->nombres) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="documento" style="color: black;">Documento</label>
                                        <input type="number" class="form-control-new" id="documento"
                                            placeholder="Documento" name="documento"
                                            value="{{ old('documento', $prepost->documento) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fexpedicion" style="color: black;">Fecha de expedicion</label>
                                        <input type="date" class="form-control-new" id="fexpedicion"
                                            placeholder="Fecha de expedicion" name="fexpedicion"
                                            value="{{ old('fexpedicion', $prepost->fexpedicion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tipocliente" style="color: black;">Tipo cliente</label>
                                        <input type="text" class="form-control-new" id="tipocliente"
                                            placeholder="tipo cliente" name="tipocliente"
                                            value="{{ old('tipocliente', $prepost->tipocliente) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="correo" style="color: black;">Correo</label>
                                        <input type="text" class="form-control-new" id="correo" placeholder="Correo"
                                            name="correo" value="{{ old('correo', $prepost->correo) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="departamento" style="color: black;">Departamento</label>
                                        <input type="text" class="form-control-new" id="departamento"
                                            placeholder="Departamento" name="departamento"
                                            value="{{ old('departamento', $prepost->departamento) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_ciudad" style="color: black;">Ciudad</label>
                                        <input type="text" class="form-control-new" id="id_ciudad" placeholder="ciudad"
                                            name="id_ciudad" value="{{ old('id_ciudad', $prepost->id_ciudad) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="barrio" style="color: black;">Barrio</label>
                                        <input type="text" class="form-control-new" id="barrio"
                                            placeholder="barrio" name="barrio"
                                            value="{{ old('barrio', $prepost->barrio) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="direccion" style="color: black;">Direccion</label>
                                        <input type="text" class="form-control-new" id="direccion"
                                            placeholder="direccion" name="direccion"
                                            value="{{ old('direccion', $prepost->direccion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="corte" style="color: black;">Corte</label>
                                        <input type="number" class="form-control-new" id="corte"
                                            placeholder="Corte" name="corte"
                                            value="{{ old('corte', $prepost->corte) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="planventa" style="color: black;">Plan venta</label>
                                        <input type="text" class="form-control-new" id="planventa"
                                            placeholder="Plan venta" name="planventa"
                                            value="{{ old('planventa', $prepost->planventa) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="activacion" style="color: black;">Activacion</label>
                                        <input type="text" class="form-control-new" id="activacion"
                                            placeholder="Activacion" name="activacion"
                                            value="{{ old('activacion', $prepost->activacion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="token" style="color: black;">Token</label>
                                        <input type="number" class="form-control-new" id="token"
                                            placeholder="Token" name="token"
                                            value="{{ old('token', $prepost->token) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="orden" style="color: black;">Numero de Orden</label>
                                        <input type="number" class="form-control-new" id="orden"
                                            placeholder="Numero de Orden" name="orden"
                                            value="{{ old('orden', $prepost->orden) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="orden" style="color: black;">Numero de Grabacion</label>
                                        <input type="number" class="form-control-new" id="numero_grabacion"
                                            placeholder="Numero de Grabacion" name="numero_grabacion"
                                            value="{{ old('numero_grabacion', $prepost->numGrabacion) }}" style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="observacion" style="color: black;">Observacion</label>
                                        <input type="text" class="form-control-new" id="observaciones"
                                            placeholder="observaciones" name="observaciones"
                                            value="{{ old('observaciones', $prepost->observaciones) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Estado</label>
                                        <select name="revisados" id="revisados" class="form-control" style="border-radius: 10px;margin-top:-10px" required>
                                            <option value="">PERDIDA</option>
                                            <option value="RECUPERADA">RECUPERADA</option>  
                                        </section>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <input hidden>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <span><label for="confronta" style="color: black;">Confronta</label><br>

                                            <a href="{{ asset('storage') . '/' . $prepost->confronta }}"><img
                                                    src="{{ asset('storage') . '/' . $prepost->confronta }}"
                                                    alt="" height="130" width="300"
                                                    style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control-new" id="obs2" name="obs2" rows="3"
                                            placeholder="Observaciones BackOficce" style="border-radius: 10px">{{ old('orden', $prepost->obs2) }}</textarea>
                                    </div>
                                    <input class="btn btn-info btn-sm" type="submit" value="EDITAR"
                                        style="border-radius: 10px; margin-left:20px"
                                        onclick="md.showNotification('top','right')">
                                    <a href="{{ route('prepostdigital.index') }}" class="btn btn-danger btn-sm"
                                        role="button" aria-pressed="true"
                                        style="border-radius: 10px;margin-left:10px">VOLVER</a>
                                </div>
                            </form>
                            
                        </div>
                        <script src="{{ asset('js/app.js') }}"></script>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
