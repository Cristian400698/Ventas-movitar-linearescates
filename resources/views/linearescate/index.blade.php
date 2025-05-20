@extends('layouts.main', ['activePage' => 'linearescate', 'titlePage' => 'LÍNEA DE RESCATE'])

@section('content')
<div class="content">
    <div class="container-fluid">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body text-center p-4">
                        <h3 class="mb-4 text-primary">TIPO DE LLAMADA</h3>
                        <button class="btn btn-lg btn-outline-primary m-2" data-toggle="modal" data-target="#clienteModal">
                            <i class="fas fa-headset"></i> SERVICIO CLIENTE
                        </button>
                        <button class="btn btn-lg btn-outline-danger m-2" data-toggle="modal" data-target="#rescateModal">
                            <i class="fas fa-life-ring"></i> LÍNEA DE RESCATE
                        </button>
                    </div>
                    <button class="btn btn-lg btn-outline-primary m-2">
                        <a href="{{ url('linearventas')}}">
                            Ventas
                        </a>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .form-control,
    .custom-select {
        border-radius: 8px;
        padding: 10px;
        font-size: 16px;
    }

    .form-group label {
        font-weight: bold;
    }

    #motivo_fuerza_mayor {
        display: none;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tipoNovedad = document.getElementById("tipo_novedad");
        const motivoFuerzaMayor = document.getElementById("motivo_fuerza_mayor");

        tipoNovedad.addEventListener("change", function() {
            if (this.value === "FUERZA MAYOR") {
                motivoFuerzaMayor.style.display = "block";
            } else {
                motivoFuerzaMayor.style.display = "none";
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tipoGeneral = document.getElementById("tipo_general");
        const tipoEspecifico = document.getElementById("tipo_especifico");
        const reagendamientoInputs = document.getElementById("reagendamientoInputs");

        const opciones = {
            "EXITOSA": ["ENTREGA EXITOSA", "CAMBIO LEVE"],
            "REAGENDAMIENTO": ["DIRECCION DE REAGENDAMIENTO", "# TK DEL REAGENDAMIENTO"],
            "NO_EXITOSO": ["CLIENTE NO CONTESTA", "ID VISION PERDIDO", "CLIENTE REHUSADO"]
        };

        tipoGeneral.addEventListener("change", function() {
            const seleccion = this.value;

            if (seleccion === "REAGENDAMIENTO") {
                tipoEspecifico.style.display = "none";
                tipoEspecifico.innerHTML = "";
                reagendamientoInputs.style.display = "block";
            } else {
                tipoEspecifico.innerHTML = "";

                const defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.textContent = "Seleccione una opción";
                tipoEspecifico.appendChild(defaultOption);

                if (opciones[seleccion]) {
                    opciones[seleccion].forEach(opcion => {
                        const nuevaOpcion = document.createElement("option");
                        nuevaOpcion.value = opcion;
                        nuevaOpcion.textContent = opcion;
                        tipoEspecifico.appendChild(nuevaOpcion);
                    });

                    tipoEspecifico.style.display = "block";
                } else {
                    tipoEspecifico.style.display = "none";
                }

                // Ocultar los inputs si no es reagendamiento
                reagendamientoInputs.style.display = "none";
            }
        });
    });
</script>


<!-- Modal Servicio Cliente -->
<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Servicio al Cliente</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ url('/linearescate') }}" method="POST">
                @csrf
                <div class="modal-body text-center">
                    <input type="hidden" id="cedulaAgente" name="cedulaAgente" value="{{ $user_id }}">
                    <input type="hidden" id="agente" name="agente" value="{{ $user_nombre }}">
                    <input type="hidden" name="tipo" value="servicio_cliente">

                    <p class="text-muted">Muchas gracias por comunicarse con Movistar,
                        tenga presente que esta línea en la opción seleccionada es de uso exclusivo para operadores logístico,
                        lo invitamos a comunicarse nuevamente al *611 o 018000930930 y escuchar atentamente las opciones para atender su solicitud.
                        </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success w-100">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Línea de Rescate -->
<div class="modal fade" id="rescateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Línea de Rescate</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ url('/linearescate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> NOMBRE MOTORIZADO</label>
                                <input type="text" name="nombreMotorizado" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> CEDULA MOTORIZADO</label>
                                <input type="number" name="cedulaMotorizado" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> LINEA TITULAR</label>
                                <input type="text" name="lineaTitular" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> #ORDEN</label>
                                <input type="text" name="nOrden" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> #GUÍA</label>
                                <input type="text" name="nGuia" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i> DIRECCIÓN REGISTRADA</label>
                                <input type="text" name="direccionRegistrada" class="form-control">
                            </div>
                        </div>

                        <!-- NUEVOS CAMPOS: CIUDAD Y DEPARTAMENTO -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i> CIUDAD</label>
                                <input type="text" name="ciudad" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i> DEPARTAMENTO</label>
                                <input type="text" name="departamento" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i>Linea de contacto motorizado</label>
                                <input type="text" name="lineaContactoMorotizado" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><i class="fas fa-map-marker-alt"></i>Hora de atención al motorizado</label>
                                <input type="time" name="HoraAtencionMotorizado" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="transportadora" class="custom-select" required>
                                    <option value="">TRANSPORTADORA</option>
                                    <option value="Brightcell">Brightcell</option>
                                    <option value="Domesa">Domesa</option>
                                    <option value="99Minutos">99Minutos</option>
                                    <option value="BSL">BSL</option>
                                    <option value="Envia">Envia</option>
                                    <option value="ESM">ESM</option>
                                    <option value="Logytech">Logytech</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="aliado" id="aliado" class="custom-select" required>
                                    <option value="">ALIADO</option>
                                    <option value="MENTIUS">MENTIUS</option>
                                    <option value="BECALL">BECALL</option>
                                    <option value="DIGITEX">DIGITEX</option>
                                    <option value="ATENTO">ATENTO</option>
                                    <!-- NUEVOS ALIADOS -->
                                    <option value="ROBOT PHOENIX">ROBOT PHOENIX</option>
                                    <option value="E-CARE">E-CARE</option>
                                    <option value="AUTOGESTION">AUTOGESTION</option>
                                    <option value="OTROS">OTROS</option>
                                </select>
                            </div>
                        </div>

                        <!-- NUEVO CAMPO: OTROS ALIADOS (aparece cuando se selecciona "OTROS") -->
                        <div class="col-md-6" id="otros_aliados_div" style="display: none;">
                            <div class="form-group">
                                <label><i class="fas fa-building"></i> ESPECIFICAR ALIADO</label>
                                <input type="text" name="otrosAliados" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="tipoNovedad" id="tipo_novedad" class="custom-select" required>
                                    <option value="">TIPO DE NOVEDAD</option>
                                    <option value="CLIENTE AUSENTE">CLIENTE AUSENTE</option>
                                    <option value="DESTINATARIO DESCONOCIDO">DESTINATARIO DESCONOCIDO</option>
                                    <option value="DIRECCION ERRADA">DIRECCION ERRADA</option>
                                    <option value="DIRECCION DEFICIENTE">DIRECCION DEFICIENTE</option>
                                    <option value="PREDIO SIN NOMENCLATURA">PREDIO SIN NOMENCLATURA</option>
                                    <option value="FUERZA MAYOR">FUERZA MAYOR</option>
                                    <!-- NUEVAS OPCIONES DE TIPO DE NOVEDAD -->
                                    <option value="DOCUMENTO ERRADO">DOCUMENTO ERRADO</option>
                                    <option value="ENTREGA SIM">ENTREGA SIM</option>
                                    <!-- OPCIONES ADICIONALES DE DOCUMENTOS -->
                                    <option value="DOCUMENTO_TITULAR">DOCUMENTO DEL TITULAR NOMBRE LINEA CELULAR</option>
                                    <option value="DOCUMENTO_TERCERO">DOCUMENTO DEL TERCERO AUTORIZADO NOMBRE LINEA CELULAR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="motivo_fuerza_mayor" style="display: none;">
                            <div class="form-group">
                                <select name="motivoFuerzaMayor" class="custom-select">
                                    <option value="">MOTIVO FUERZA MAYOR</option>
                                    <option value="VIA CERRADA">VIA CERRADA</option>
                                    <option value="FUERTE LLUVIAS">FUERTE LLUVIAS</option>
                                    <option value="PAROS">PAROS</option>
                                </select>
                            </div>
                        </div>

                        <!-- CAMPOS PARA DOCUMENTO DEL TITULAR -->
                        <div class="col-md-12" id="campos_titular" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-id-card"></i> DOCUMENTO DEL TITULAR</label>
                                        <input type="number" name="documentoTitular"   class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> NOMBRE DEL TITULAR</label>
                                        <input type="text" name="nombreTitular" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-phone"></i> LÍNEA CELULAR DEL TITULAR</label>
                                        <input type="number" name="lineaCelularTitular" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CAMPOS PARA DOCUMENTO DEL TERCERO AUTORIZADO -->
                        <div class="col-md-12" id="campos_tercero" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-id-card"></i> DOCUMENTO DEL TERCERO</label>
                                        <input type="number" name="documentoTercero" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> NOMBRE DEL TERCERO</label>
                                        <input type="text" name="nombreTercero" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-phone"></i> LÍNEA CELULAR DEL TERCERO</label>
                                        <input type="number" name="lineaCelularTercero" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- NUEVO CAMPO: TIPO DE TERCERO -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="tipoTercero" class="custom-select" required>
                                    <option value="">TIPO DE TERCERO</option>
                                    <option value="TERCERO_AUTORIZADO">TERCERO AUTORIZADO</option>
                                    <option value="TERCERO_NO_AUTORIZADO">TERCERO NO AUTORIZADO</option>
                                </select>
                            </div>
                        </div>

                        <!-- CAMPO DE ESTADO DEL MOTORIZADO -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="estadoMotorizado" class="custom-select" required>
                                    <option value="">ESTADO DEL MOTORIZADO</option>
                                    <option value="EN_PUNTO_ENTREGA">MOTORIZADO LLEGÓ AL PUNTO DE ENTREGA</option>
                                    <option value="NO_EN_PUNTO_ENTREGA">MOTORIZADO NO ESTÁ EN EL PUNTO DE ENTREGA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p style="text-align: center;">SOLUCIÓN PRIMER CONTACTO </p>
                    <hr>
                    <div class="row">
                        <!-- Select Principal -->
                        <select name="tipificacion" id="tipo_general" class="custom-select col-md-6">
                            <option value="">Seleccione una opción</option>
                            <option value="EXITOSA">EXITOSA</option>
                            <option value="REAGENDAMIENTO">REAGENDAMIENTO</option>
                            <option value="NO_EXITOSO">NO EXITOSO</option>
                        </select>

                        <!-- Select Secundario (se oculta por defecto) -->
                        <select name="SubTipificacion" id="tipo_especifico" class="custom-select col-md-6" style="display: none;">
                            <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                        </select>

                        <!-- Campo para valor de equipo (para EXITOSA y REAGENDAMIENTO) -->
                        <div id="valorEquipoDiv" class="col-md-12" style="display: none;">
                            <div class="form-group mt-3">
                                <label for="modeloEquipo"><i class="fas fa-mobile-alt"></i> MODELO DE EQUIPO</label>
                                <select class="form-control" name="modeloEquipo" id="modeloEquipo">
                                    <option value="">Seleccione un modelo</option>
                                    <option value="HONOR 200 SMART 5G 8+256GB" data-valor="$979,935">HONOR 200 SMART 5G 8+256GB</option>
                                    <option value="HONOR 200 SMART 5G 8+256GB" data-valor="$979,935">HONOR 200 SMART 5G 8+256GB</option>
                                    <option value="HONOR MAGIC 6 LITE 8+256GB 5G" data-valor="$1,699,935">HONOR MAGIC 6 LITE 8+256GB 5G</option>
                                    <option value="HONOR MAGIC 6 LITE 8+256GB 5G" data-valor="$1,699,935">HONOR MAGIC 6 LITE 8+256GB 5G</option>
                                    <option value="HONOR X5B PLUS 4+256GB" data-valor="$499,935">HONOR X5B PLUS 4+256GB</option>
                                    <option value="IPHONE 13 128GB" data-valor="$4,339,929">IPHONE 13 128GB</option>
                                    <option value="IPHONE 15 128GB" data-valor="$5,029,929">IPHONE 15 128GB</option>
                                    <option value="IPHONE 15 PRO MAX 256GB" data-valor="$8,238,929">IPHONE 15 PRO MAX 256GB</option>
                                    <option value="IPHONE 15E 128GB" data-valor="$3,238,929">IPHONE 15E 128GB</option>
                                    <option value="MOTO EDGE 50 FUSION 5G 8+256GB" data-valor="$949,909">MOTO EDGE 50 FUSION 5G 8+256GB</option>
                                    <option value="MOTO EDGE 50 FUSION 5G 8+256GB" data-valor="$949,909">MOTO EDGE 50 FUSION 5G 8+256GB</option>
                                    <option value="MOTO EDGE 50 FUSION 5G 8+256GB" data-valor="$949,909">MOTO EDGE 50 FUSION 5G 8+256GB</option>
                                    <option value="MOTO EDGE 50 FUSION 5G 8+256GB" data-valor="$949,909">MOTO EDGE 50 FUSION 5G 8+256GB</option>
                                    <option value="MOTO G15 4+256GB" data-valor="$749,839">MOTO G15 4+256GB</option>
                                    <option value="OPPO A80 8+256GB" data-valor="$999,839">OPPO A80 8+256GB</option>
                                    <option value="OPPO A80 5G 8+256GB" data-valor="$999,839">OPPO A80 5G 8+256GB</option>
                                    <option value="OPPO A80 5G 8+256GB" data-valor="$999,839">OPPO A80 5G 8+256GB</option>
                                    <option value="OPPO A80 5G 8+256GB" data-valor="$999,839">OPPO A80 5G 8+256GB</option>
                                    <option value="OPPO RENO 13 5G 12+512 GB" data-valor="$3,299,839">OPPO RENO 13 5G 12+512 GB</option>
                                    <option value="OPPO RENO 13 5G 12+512 GB" data-valor="$3,299,839">OPPO RENO 13 5G 12+512 GB</option>
                                    <option value="SAMSUNG GALAXY S25 5G 256GB" data-valor="$4,480,939">SAMSUNG GALAXY S25 5G 256GB</option>
                                    <option value="SAMSUNG GALAXY S25 5G 256GB" data-valor="$4,480,939">SAMSUNG GALAXY S25 5G 256GB</option>
                                    <option value="SAMSUNG GALAXY S25 5G 256GB" data-valor="$4,480,939">SAMSUNG GALAXY S25 5G 256GB</option>
                                    <option value="SAMSUNG GALAXY S25 ULTRA 256GB 5G" data-valor="$6,427,939">SAMSUNG GALAXY S25 ULTRA 256GB 5G</option>
                                    <option value="SAMSUNG GALAXY S25 ULTRA 256GB 5G" data-valor="$6,427,939">SAMSUNG GALAXY S25 ULTRA 256GB 5G</option>
                                    <option value="SAMSUNG GALAXY S25 ULTRA 256GB 5G" data-valor="$6,427,939">SAMSUNG GALAXY S25 ULTRA 256GB 5G</option>
                                    <option value="VIVO Y18 8+256GB" data-valor="$599,879">VIVO Y18 8+256GB</option>
                                    <option value="VIVO Y18 8+256GB" data-valor="$599,879">VIVO Y18 8+256GB</option>
                                    <option value="VIVO Y38 8+256GB" data-valor="$849,879">VIVO Y38 8+256GB</option>
                                    <option value="VIVO Y38 8+256GB" data-valor="$849,879">VIVO Y38 8+256GB</option>
                                    <option value="XIAOMI REDMI 13 8+256GB" data-valor="$599,889">XIAOMI REDMI 13 8+256GB</option>
                                    <option value="XIAOMI REDMI NOTE 14 4G 8+256GB" data-valor="$1,049,889">XIAOMI REDMI NOTE 14 4G 8+256GB</option>
                                    <option value="XIAOMI REDMI NOTE 14 5G 8+256GB" data-valor="$1,049,889">XIAOMI REDMI NOTE 14 5G 8+256GB</option>
                                    <option value="XIAOMI REDMI NOTE 14 PRO 4G 8+256GB" data-valor="$1,349,889">XIAOMI REDMI NOTE 14 PRO 4G 8+256GB</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="valorEquipo"><i class="fas fa-dollar-sign"></i> VALOR DE EQUIPO</label>
                                <input type="text" class="form-control" name="valorEquipo" id="valorEquipo" readonly>
                            </div>
                        </div>

                        <div id="reagendamientoInputs" class="col-md-12" style="display: none;">
                            <div class="form-group mt-3">
                                <label for="direccionReagendamiento">Dirección de Reagendamiento</label>
                                <input type="text" class="form-control" name="direccionReagendamiento" id="direccionReagendamiento" placeholder="Ingrese la dirección">
                            </div>
                            <div class="form-group mt-3">
                                <label for="tkReagendamiento"># TK del Reagendamiento</label>
                                <input type="text" class="form-control" name="tkReagendamiento" id="tkReagendamiento" placeholder="Ingrese el número de TK">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><i class="fas fa-user"></i> OBSERVACIÓN</label>
                                <input type="text" name="Observacion" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="simcard" id="tipo_general" class="custom-select col-md-12">
                                    <option value="">CAMBIO RECIENTE DE SIMCARD</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto"><i class="fas fa-camera"></i> Print ID VISIÓN</label>
                                <input type="file" name="idVision" id="foto" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto"><i class="fas fa-camera"></i> Print Reagendamiento</label>
                                <input type="file" name="reagendamientoImg" id="foto" class="form-control">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="cedulaAgente" name="cedulaAgente" value="{{ $user_id }}">
                    <input type="hidden" id="agente" name="agente" value="{{ $user_nombre }}">
                    <input type="hidden" name="tipo" value="linea_rescate">

                    <hr>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript para manejar la lógica de los requirimientos-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mostrar/ocultar campo de "Otros Aliados"
    const aliadoSelect = document.getElementById('aliado');
    const otrosAliadosDiv = document.getElementById('otros_aliados_div');

    aliadoSelect.addEventListener('change', function() {
        if (this.value === 'OTROS') {
            otrosAliadosDiv.style.display = 'block';
        } else {
            otrosAliadosDiv.style.display = 'none';
        }
    });

    // Mostrar/ocultar campo de "Motivo Fuerza Mayor"
    const tipoNovedadSelect = document.getElementById('tipo_novedad');
    const motivoFuerzaMayorDiv = document.getElementById('motivo_fuerza_mayor');
    const camposTitularDiv = document.getElementById('campos_titular');
    const camposTerceroDiv = document.getElementById('campos_tercero');

    tipoNovedadSelect.addEventListener('change', function() {
        // Ocultar todos los campos especiales primero
        motivoFuerzaMayorDiv.style.display = 'none';
        camposTitularDiv.style.display = 'none';
        camposTerceroDiv.style.display = 'none';


        // Mostrar el campo correspondiente según la selección
        if (this.value === 'FUERZA MAYOR') {
            motivoFuerzaMayorDiv.style.display = 'block';
        } else if (this.value === 'DOCUMENTO_TITULAR') {
            camposTitularDiv.style.display = 'block';
        } else if (this.value === 'DOCUMENTO_TERCERO') {
            camposTerceroDiv.style.display = 'block';
        }
    });

    // Función para actualizar automáticamente el valor del equipo
    const modeloEquipoSelect = document.getElementById('modeloEquipo');
    const valorEquipoInput = document.getElementById('valorEquipo');

    if (modeloEquipoSelect) {
        modeloEquipoSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const valor = selectedOption.getAttribute('data-valor');
            valorEquipoInput.value = valor || '';
        });
    }

    // Referencio los elementos
    const tipoGeneralSelect = document.getElementById('tipo_general');
    const tipoEspecificoSelect = document.getElementById('tipo_especifico');
    const reagendamientoInputs = document.getElementById('reagendamientoInputs');
    const valorEquipoDiv = document.getElementById('valorEquipoDiv');

    // Asegurarnos de que el select secundario esté oculto inicialmente
    if (tipoEspecificoSelect) {
        tipoEspecificoSelect.style.display = 'none';
    }

    // Resto del código para manejar cambios en tipificación
    if (tipoGeneralSelect) {
        tipoGeneralSelect.addEventListener('change', function() {
            // Limpiar opciones anteriores y preparar el select
            tipoEspecificoSelect.innerHTML = '';

            if (this.value === 'NO_EXITOSO') {
                // Opciones para NO EXITOSO
                valorEquipoDiv.style.display = 'none';
                const opciones = ['ENTREGA SIM', 'SIN REAGENDAMIENTO POR AUSENCIA'];

                // Agregar opción por defecto
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Seleccione una opción';
                tipoEspecificoSelect.appendChild(defaultOption);

                // Agregar opciones específicas
                opciones.forEach(opcion => {
                    const option = document.createElement('option');
                    option.value = opcion;
                    option.textContent = opcion;
                    tipoEspecificoSelect.appendChild(option);
                });

                // Mostrar el select secundario
                tipoEspecificoSelect.style.display = 'block';
                reagendamientoInputs.style.display = 'none';
            }
            else if (this.value === 'EXITOSA') {
                // Opciones para EXITOSA
                valorEquipoDiv.style.display = 'block';

                // Agregar opción por defecto
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Seleccione una opción';
                tipoEspecificoSelect.appendChild(defaultOption);

                // Agregar opciones específicas
                const opciones = ['ENTREGA EXITOSA', 'CAMBIO LEVE'];
                opciones.forEach(opcion => {
                    const option = document.createElement('option');
                    option.value = opcion;
                    option.textContent = opcion;
                    tipoEspecificoSelect.appendChild(option);
                });

                // Mostrar el select secundario
                tipoEspecificoSelect.style.display = 'block';
                reagendamientoInputs.style.display = 'none';
            }
            else if (this.value === 'REAGENDAMIENTO') {
                // Para reagendamiento, mostrar los campos específicos
                valorEquipoDiv.style.display = 'block';

                // Agregar opción por defecto al select específico
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'Seleccione una opción';
                tipoEspecificoSelect.appendChild(defaultOption);

                const opciones = ['ENTREGA EXITOSA', 'ENTREGA NO EXITOSA'];
                opciones.forEach(opcion => {
                    const option = document.createElement('option');
                    option.value = opcion;
                    option.textContent = opcion;
                    tipoEspecificoSelect.appendChild(option);
                });

                // Mostrar tanto el select secundario como los campos de reagendamiento
                tipoEspecificoSelect.style.display = 'block';
                reagendamientoInputs.style.display = 'block';
            }
            else {
                // Si no hay selección, ocultar todo
                tipoEspecificoSelect.style.display = 'none';
                reagendamientoInputs.style.display = 'none';
                valorEquipoDiv.style.display = 'none';
            }
        });
    }
});
</script>

@endsection
