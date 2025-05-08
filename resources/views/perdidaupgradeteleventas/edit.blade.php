@extends('layouts.main', ['activePage' => 'Upgrade', 'titlePage' => 'PERDIDAS UPGRADE TELEVENTAS'])
@section('content')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">Editor de Gestion upgradetelev</h3>
                    </center>
                    <div class="card">
                        <div class="card-body">
                            <form name="f1" action="{{ url('/perdidaupgradeteleventa/' . $upgradetelev->id) }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" id="backoffice" name="backoffice" value="{{ Auth::user()->cedula }}">

                                <input type="hidden" id="agente" name="agente" value="{{ $upgradetelev->agente }}">
                                <input type="hidden" id="segmento" name="segmento" value="{{ $upgradetelev->segmento }}">
                                <input type="hidden" id="confronta" name="confronta" value="{{ $upgradetelev->confronta }}">
                                <input type="hidden" id="hora" name="hora" value="{{ $upgradetelev->hora }}">
                                <input type="hidden" id="dia" name="dia" value="{{ $upgradetelev->dia }}">


                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nombres" style="color: black;">Nombres</label>
                                        <input type="text" class="form-control-new" id="nombres" placeholder="Nombres"
                                            name="nombres" value="{{ old('nombres', $upgradetelev->nombres) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="documento" style="color: black;">Numero</label>
                                        <input type="number" class="form-control-new" id="documento"
                                            placeholder="documento" name="documento"
                                            value="{{ old('documento', $upgradetelev->documento) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="correo" style="color: black;">Correo</label>
                                        <input type="text" class="form-control-new" id="correo"
                                            placeholder="Correo Electronico" name="correo"
                                            value="{{ old('correo', $upgradetelev->correo) }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="selector" style="color: black;">Selector</label>
                                        <input type="text" class="form-control-new" id="selector" placeholder="Selector"
                                            name="selector" value="{{ old('selector', $upgradetelev->selector) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="fventa" style="color: black;">Fecha de venta</label>
                                        <input type="date" class="form-control-new" id="fventa" placeholder="fventa"
                                            name="fventa" value="{{ old('fventa', $upgradetelev->fventa) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="number" style="color: black;">Numero</label>
                                        <input type="number" class="form-control-new" id="numero" placeholder="Numero"
                                            name="numero" value="{{ old('numero', $upgradetelev->numero) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="corte" style="color: black;">Corte</label>
                                        <input type="number" class="form-control-new" id="corte" placeholder="Corte"
                                            name="corte" value="{{ old('corte', $upgradetelev->corte) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="planhistorico" style="color: black;">Plan historico</label>
                                        <input type="text" class="form-control-new" id="planhistorico"
                                            placeholder="Plan historico" name="planhistorico"
                                            value="{{ old('planhistorico', $upgradetelev->planhistorico) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="planventa" style="color: black;">Plan venta</label>
                                        <input type="number" class="form-control-new" id="planventa"
                                            placeholder="Plan venta" name="planventa"
                                            value="{{ old('planventa', $upgradetelev->planventa) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="activacion" style="color: black;">Activacion</label>
                                        <input type="text" class="form-control-new" id="activacion"
                                            placeholder="Activacion" name="activacion"
                                            value="{{ old('activacion', $upgradetelev->activacion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="ngrabacion" style="color: black;">Numero de grabacion</label>
                                        <input type="number" class="form-control-new" id="ngrabacion"
                                            placeholder="numero de grabacion" name="ngrabacion"
                                            value="{{ old('ngrabacion', $upgradetelev->ngrabacion) }}"
                                            style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="orden" style="color: black;">Numero de Orden</label>
                                        <input type="number" class="form-control-new" id="orden"
                                            placeholder="numero de Orden" name="orden"
                                            value="{{ old('orden', $upgradetelev->orden) }}" style="border-radius: 10px">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="observacion" style="color: black;">Observacion</label>
                                        <input type="text" class="form-control-new" id="observacion"
                                            placeholder="observacion" name="observacion"
                                            value="{{ old('observacion', $upgradetelev->observacion) }}"
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
                                        <label for="confronta" style="color: black;">Confronta</label>
                                        <span>
                                            <a href="{{ asset('storage') . '/' . $upgradetelev->confronta }}"><img
                                                    src="{{ asset('storage') . '/' . $upgradetelev->confronta }}"
                                                    alt="" height="130" width="260"
                                                    style="border-radius: 10px"></a>
                                        </span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control-new" id="obs2" name="obs2" rows="3"
                                            placeholder="Observaciones BackOficce" style="border-radius: 10px">{{ old('ngrabacion', $upgradetelev->obs2) }}</textarea>
                                    </div>
                                </div>
                                <input class="btn btn-info btn-sm" type="submit" value="Enviar"
                                    style="border-radius: 10px" onclick="md.showNotification('top','right')">
                            </form>

                        </div>
                        <script src="{{ asset('js/app.js') }}"></script>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
