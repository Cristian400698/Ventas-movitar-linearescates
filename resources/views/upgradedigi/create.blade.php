@extends('layouts.main', ['activePage' => 'Upgrade', 'titlePage' => 'UPGRADE DIGITAL'])
@section('content')



    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center" style="color:aliceblue;margin-top: 50px;">UP GRADE DIGITAL</h3>
                    </center>
                    <div class="card">
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success" role="success">
                            {{ session('success') }}
                            </div>
                            @endif
                            <form action="{{ url('/upgradedigi') }}" method="POST" enctype="multipart/form-data"
                                class="form-horizontal">
                                {{ csrf_field() }}
                                <br>
                                <input type="hidden" id="agente" name="agente" value="{{ $user_id }}">
                                <input type="hidden" id="dia" name="dia" class="form-control" placeholder="hora"
                                    value="{{ $date }}" required>
                                <input type="hidden" id="hora" name="hora" class="form-control" placeholder="hora"
                                    value="{{ $hora }}" required>
                                    <input type="hidden" id="revisados" name="revisados" class="form-control" placeholder="NUEVO"
                                    value="NUEVO" required>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" id="nombres" name="nombres" class="form-control"
                                            placeholder="Nombres y Apellidos" onkeypress="return check(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="number" id="documento" name="documento" class="form-control"
                                            placeholder="Documento" min="1" onkeypress="return num(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="mail" id="correo" name="correo" class="form-control"
                                            placeholder="Correo Electronico" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-3 col-form-label">
                                        <label for="fventa" style="color: black;">Fecha de venta</label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="date" id="fventa" name="fventa" class="form-control"
                                            placeholder="Fecha de venta" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="number" id="numero" name="numero" class="form-control"
                                            placeholder="Numero de celular" min="1" onkeypress="return num(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <select name="corte" id="corte" class="form-control" required>
                                            <option value="0" style="border-radius: 10px">Corte</option>
                                            @foreach ($corte as $cortes)
                                                <option value="{{ $cortes->corte }}">{{ $cortes->corte }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="" style="color: black;">Seleccione una Opción</label>
                                        <div class="form-check form-check-inline">
                                            <input class="j-chek" type="radio" name="selector" id="selector1"
                                                value="leads" required>
                                            <label class="form-check-label j2-chek" for="selector1" style="color: black;">Leads</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="j-chek" type="radio" name="selector" id="selector2"
                                                value="BBDD">
                                            <label class="form-check-label j2-chek" for="selector2" style="color: black;">BBDD</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="planhistorico" id="planhistorico" class="form-control" required>
                                            <option value="0" style="border-radius: 10px">Planes Historicos</option>
                                            @foreach ($planhistorico as $planhistoricos)
                                                <option value="{{ $planhistoricos->historico }}">
                                                    {{ $planhistoricos->historico }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="planventa" id="planventa" class="form-control" required>
                                            <option value="0" style="border-radius: 10px">Plan que adquire</option>
                                            @foreach ($Planadquieres as $Planadquiere)
                                                <option value="{{ $Planadquiere->planadquiere }}">{{ $Planadquiere->planadquiere }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="activacion" style="color: black;">Activacion</label>

                                        <select name="activacion" id="activacion" class="form-control" required>
                                            <option value="0" style="border-radius: 10px">Selecciona</option>
                                            @foreach ($activacion as $activaciones)
                                                <option value="{{ $activaciones->activacion }}">
                                                    {{ $activaciones->activacion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="ngrabacion" style="color: black;">Numero de Grabacion</label>
                                        <input type="number" id="ngrabacion" name="ngrabacion" class="form-control"
                                            min="1" onkeypress="return num(event)" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="orden" style="color: black;">Orden</label>
                                        <input type="number" id="orden" name="orden" class="form-control" required style="border-radius: 10px" onkeypress="return num(event)">
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="confronta" style="color: black;">Confronta</label>
                                        <input type="file" id="confronta" name="confronta" class="form-control" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="likewize" style="color: black;">likewize</label>
                                        <input type="file" id="likewize" name="likewize" class="form-control" required style="border-radius: 10px">
                                    </div>
                                    <div class="col-sm-4 col-form-label">
                                        <label for="ley2300" style="color: black;">ley2300</label>
                                        <input type="file" id="ley2300" name="ley2300" class="form-control" required style="border-radius: 10px">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea id="observacion" name="observacion" class="form-control" rows="3"
                                            placeholder="Observaciones" required style="border-radius: 10px"></textarea>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info btn-sm" style="border-radius: 10px">Enviar</button>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" id="segmento" name="segmento" class="form-control" placeholder="segmento"
                                value="Digital" hidden>
                        </div>
                        </form>

                        <script src="{{ asset('js/app.js') }}"></script>


                        <script>
                            function check(e) {
                                tecla = (document.all) ? e.keyCode : e.which;

                                // Patron de entrada, en este caso solo acepta numeros y letras  
                                patron =
                                    /[a, b, c, d, e, f, g, h, i, j, k, l, m, n, ñ, o, p, q, r, s, t, u, v, w, x, y, z,A, B, C, D, E, F, G, H, I, J, K, L, M, N, Ñ, O, P, Q, R, S, T, U, V, W, X, Y, Z]/;
                                tecla_final = String.fromCharCode(tecla);
                                return patron.test(tecla_final);
                            }
                        </script>


                        <script>
                            function num(e) {
                                tecla = (document.all) ? e.keyCode : e.which;

                                // Patron de entrada, en este caso solo acepta numeros y letras  
                                patron = /[1,2,3,4,5,6,7,8,9,0]/;
                                tecla_final = String.fromCharCode(tecla);
                                return patron.test(tecla_final);
                            }
                        </script>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>

<link rel="stylesheet" href="../componentes/estilos.css">
<script src="../componentes/java.js"></script>


@endsection
