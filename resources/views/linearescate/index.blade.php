@extends('layouts.main', ['activePage' => 'linearescate', 'titlePage' => 'LÍNEA DE RESCATE'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (session('success'))
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
                            <button class="btn btn-lg btn-outline-primary m-2" data-toggle="modal"
                                data-target="#clienteModal">
                                <i class="fas fa-headset"></i> SERVICIO CLIENTE
                            </button>
                            <button class="btn btn-lg btn-outline-danger m-2" data-toggle="modal"
                                data-target="#rescateModal">
                                <i class="fas fa-life-ring"></i> LÍNEA DE RESCATE
                            </button>
                        </div>
                        <button class="btn btn-lg btn-outline-primary m-2">
                            <a href="{{ url('linearventas') }}">
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
                            tenga presente que esta línea en la opción seleccionada es de uso exclusivo para operadores
                            logístico,
                            lo invitamos a comunicarse nuevamente al *611 o 018000930930 y escuchar atentamente las opciones
                            para atender su solicitud.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal servicio linea de rescate --}}
    <div class="modal fade" id="rescateModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Línea de Rescate</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ url('/linearescate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <!-- NUEVA SECCIÓN: SELECTOR IN/OUT -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-white text-center">
                                        <h6 class="mb-0"><i class="fas fa-exchange-alt"></i> TIPO DE LLAMADA</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <select name="tipoLlamada" id="tipoLlamadaRescate"
                                                    class="custom-select custom-select-lg" required>
                                                    <option value="">Seleccione el tipo de llamada</option>
                                                    <option value="IN">IN - Llamada Entrante</option>
                                                    <option value="OUT">OUT - Llamada Saliente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CONTENIDO PARA OUT (Solo mensaje) -->
                        <!-- CONTENIDO COMPLETO PARA OUT -->
                        <div id="contenidoOUT" style="display: none;">

                            <!-- BUSCADOR POR LÍNEA TITULAR -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="card border-warning">
                                        <div class="card-header bg-warning text-dark text-center">
                                            <h6 class="mb-0"><i class="fas fa-search"></i> BUSCAR ÚLTIMO REGISTRO</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" id="buscarLineaTitular" class="form-control"
                                                        placeholder="Ingrese línea del titular para cargar último registro">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" id="btnBuscarRegistro"
                                                        class="btn btn-warning btn-block">
                                                        <i class="fas fa-search"></i> Buscar
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="mensajeBusqueda" class="mt-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FORMULARIO COMPLETO PARA OUT -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> NOMBRE MOTORIZADO</label>
                                        <input type="text" name="nombreMotorizado2" id="nombreMotorizadoOUT"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> CEDULA MOTORIZADO</label>
                                        <input type="number" name="cedulaMotorizado2" id="cedulaMotorizadoOUT"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> LINEA TITULAR</label>
                                        <input type="text" name="lineaTitular2" id="lineaTitularOUT"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> #ORDEN</label>
                                        <input type="text" name="nOrden2" id="nOrdenOUT" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> #GUÍA</label>
                                        <input type="text" name="nGuia2" id="nGuiaOUT" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-map-marker-alt"></i> DIRECCIÓN REGISTRADA</label>
                                        <input type="text" name="direccionRegistrada2" id="direccionRegistradaOUT"
                                            class="form-control">
                                    </div>
                                </div>

                                <!-- NUEVOS CAMPOS: CIUDAD Y DEPARTAMENTO -->
                                <div class="form-group col-md-6">
                                    <select name="departamento2" id="departamentoOUT" class="form-control"
                                        style="border-radius: 10px">
                                        <option value="">Departamento</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="ciudad2" id="ciudadOUT" class="form-control"
                                        style="border-radius: 10px">
                                        <option value="">Ciudad</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-map-marker-alt"></i>Linea de contacto motorizado</label>
                                        <input type="text" name="lineaContactoMorotizado2"
                                            id="lineaContactoMotorizadoOUT" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><i class="fas fa-map-marker-alt"></i>Hora de atención al motorizado</label>
                                        <input type="time" name="HoraAtencionMotorizado2" id="horaAtencionOUT"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="transportadora2" id="transportadoraOUT" class="custom-select">
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
                                        <select name="aliado2" id="aliadoOUT" class="custom-select">
                                            <option value="">ALIADO</option>
                                            <option value="MENTIUS">MENTIUS</option>
                                            <option value="BECALL">BECALL</option>
                                            <option value="DIGITEX">DIGITEX</option>
                                            <option value="ATENTO">ATENTO</option>
                                            <option value="ROBOT PHOENIX">ROBOT PHOENIX</option>
                                            <option value="E-CARE">E-CARE</option>
                                            <option value="AUTOGESTION">AUTOGESTION</option>
                                            <option value="OTROS">OTROS</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- NUEVO CAMPO: OTROS ALIADOS -->
                                <div class="col-md-6" id="otros_aliados_div_out" style="display: none;">
                                    <div class="form-group">
                                        <label><i class="fas fa-building"></i> ESPECIFICAR ALIADO</label>
                                        <input type="text" name="otrosAliados2" id="otrosAliadosOUT"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="tipoNovedad2" id="tipo_novedad_out" class="custom-select">
                                            <option value="">TIPO DE NOVEDAD</option>
                                            <option value="CLIENTE AUSENTE">CLIENTE AUSENTE</option>
                                            <option value="DESTINATARIO DESCONOCIDO">DESTINATARIO DESCONOCIDO</option>
                                            <option value="DIRECCION ERRADA">DIRECCION ERRADA</option>
                                            <option value="DIRECCION DEFICIENTE">DIRECCION DEFICIENTE</option>
                                            <option value="PREDIO SIN NOMENCLATURA">PREDIO SIN NOMENCLATURA</option>
                                            <option value="FUERZA MAYOR">FUERZA MAYOR</option>
                                            <option value="DOCUMENTO ERRADO">DOCUMENTO ERRADO</option>
                                            <option value="ENTREGA SIM">ENTREGA SIM</option>
                                            <option value="ENTREGA_EQUIPO">ENTREGA EQUIPO</option>
                                            <option value="DOCUMENTO_TITULAR">DOCUMENTO DEL TITULAR NOMBRE LINEA CELULAR
                                            </option>
                                            <option value="DOCUMENTO_TERCERO">DOCUMENTO DEL TERCERO AUTORIZADO NOMBRE LINEA
                                                CELULAR</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="motivo_fuerza_mayor_out" style="display: none;">
                                    <div class="form-group">
                                        <select name="motivoFuerzaMayor2" id="motivoFuerzaMayorOUT"
                                            class="custom-select">
                                            <option value="">MOTIVO FUERZA MAYOR</option>
                                            <option value="VIA CERRADA">VIA CERRADA</option>
                                            <option value="FUERTE LLUVIAS">FUERTE LLUVIAS</option>
                                            <option value="PAROS">PAROS</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- CAMPOS PARA DOCUMENTO DEL TITULAR -->
                                <div class="col-md-12" id="campos_titular_out" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-id-card"></i> DOCUMENTO DEL TITULAR</label>
                                                <input type="number" name="documentoTitular2" id="documentoTitularOUT"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-user"></i> NOMBRE DEL TITULAR</label>
                                                <input type="text" name="nombreTitular2" id="nombreTitularOUT"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-phone"></i> LÍNEA CELULAR DEL TITULAR</label>
                                                <input type="number" name="lineaCelularTitular2"
                                                    id="lineaCelularTitularOUT" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CAMPOS PARA DOCUMENTO DEL TERCERO AUTORIZADO -->
                                <div class="col-md-12" id="campos_tercero_out" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-id-card"></i> DOCUMENTO DEL TERCERO</label>
                                                <input type="number" name="documentoTercero2" id="documentoTerceroOUT"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-user"></i> NOMBRE DEL TERCERO</label>
                                                <input type="text" name="nombreTercero2" id="nombreTerceroOUT"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-phone"></i> LÍNEA CELULAR DEL TERCERO</label>
                                                <input type="number" name="lineaCelularTercero2"
                                                    id="lineaCelularTerceroOUT" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- NUEVO CAMPO: TIPO DE TERCERO -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="tipoTercero2" id="tipoTerceroOUT" class="custom-select">
                                            <option value="">TIPO DE TERCERO</option>
                                            <option value="TERCERO_AUTORIZADO">TERCERO AUTORIZADO</option>
                                            <option value="TERCERO_NO_AUTORIZADO">TERCERO NO AUTORIZADO</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- CAMPO DE ESTADO DEL MOTORIZADO -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="estadoMotorizado2" id="estadoMotorizadoOUT" class="custom-select">
                                            <option value="">ESTADO DEL MOTORIZADO</option>
                                            <option value="EN_PUNTO_ENTREGA">MOTORIZADO LLEGÓ AL PUNTO DE ENTREGA</option>
                                            <option value="NO_EN_PUNTO_ENTREGA">MOTORIZADO NO ESTÁ EN EL PUNTO DE ENTREGA
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <p style="text-align: center;">SOLUCIÓN PRIMER CONTACTO </p>
                            <hr>

                            <div class="row">
                                <!-- Select Principal -->
                                <select name="tipificacion2" id="tipo_general_out" class="custom-select col-md-6">
                                    <option value="">Seleccione una opción</option>
                                    <option value="EXITOSA">EXITOSA</option>
                                    <option value="REAGENDAMIENTO">REAGENDAMIENTO</option>
                                    <option value="NO_EXITOSO">NO EXITOSO</option>
                                </select>

                                <!-- Select Secundario -->
                                <select name="SubTipificacion2" id="tipo_especifico_out" class="custom-select col-md-6"
                                    style="display: none;">
                                    <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                                </select>

                                <!-- Campo para valor de equipo -->
                                <div id="valorEquipoDivOUT" class="col-md-12" style="display: none;">
                                    <div class="form-group mt-3">
                                        <label for="modeloEquipoOUT"><i class="fas fa-mobile-alt"></i> MODELO DE
                                            EQUIPO</label>
                                        <select class="form-control" name="modeloEquipo2" id="modeloEquipoOUT">
                                            <option value="">Seleccione un modelo</option>
                                            <option value="HONOR 200 SMART 5G 8+256GB" data-valor="$979,935">HONOR 200
                                                SMART 5G 8+256GB</option>
                                            <option value="HONOR MAGIC 6 LITE 8+256GB 5G" data-valor="$1,699,935">HONOR
                                                MAGIC 6 LITE 8+256GB 5G</option>
                                            <option value="HONOR X5B PLUS 4+256GB" data-valor="$499,935">HONOR X5B PLUS
                                                4+256GB</option>
                                            <option value="IPHONE 13 128GB" data-valor="$4,339,929">IPHONE 13 128GB
                                            </option>
                                            <option value="IPHONE 15 128GB" data-valor="$5,029,929">IPHONE 15 128GB
                                            </option>
                                            <option value="IPHONE 15 PRO MAX 256GB" data-valor="$8,238,929">IPHONE 15 PRO
                                                MAX 256GB</option>
                                            <option value="IPHONE 15E 128GB" data-valor="$3,238,929">IPHONE 15E 128GB
                                            </option>
                                            <option value="MOTO EDGE 50 FUSION 5G 8+256GB" data-valor="$949,909">MOTO EDGE
                                                50 FUSION 5G 8+256GB</option>
                                            <option value="MOTO G15 4+256GB" data-valor="$749,839">MOTO G15 4+256GB
                                            </option>
                                            <option value="OPPO A80 8+256GB" data-valor="$999,839">OPPO A80 8+256GB
                                            </option>
                                            <option value="OPPO A80 5G 8+256GB" data-valor="$999,839">OPPO A80 5G 8+256GB
                                            </option>
                                            <option value="OPPO RENO 13 5G 12+512 GB" data-valor="$3,299,839">OPPO RENO 13
                                                5G 12+512 GB</option>
                                            <option value="SAMSUNG GALAXY S25 5G 256GB" data-valor="$4,480,939">SAMSUNG
                                                GALAXY S25 5G 256GB</option>
                                            <option value="SAMSUNG GALAXY S25 ULTRA 256GB 5G" data-valor="$6,427,939">
                                                SAMSUNG GALAXY S25 ULTRA 256GB 5G</option>
                                            <option value="VIVO Y18 8+256GB" data-valor="$599,879">VIVO Y18 8+256GB
                                            </option>
                                            <option value="VIVO Y38 8+256GB" data-valor="$849,879">VIVO Y38 8+256GB
                                            </option>
                                            <option value="XIAOMI REDMI 13 8+256GB" data-valor="$599,889">XIAOMI REDMI 13
                                                8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 4G 8+256GB" data-valor="$1,049,889">XIAOMI
                                                REDMI NOTE 14 4G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 5G 8+256GB" data-valor="$1,049,889">XIAOMI
                                                REDMI NOTE 14 5G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 PRO 4G 8+256GB" data-valor="$1,349,889">
                                                XIAOMI REDMI NOTE 14 PRO 4G 8+256GB</option>

                                            <!-- Nuevas opciones agregadas -->
                                            <option value="CATERPILLAR S31" data-valor="$719,950">CATERPILLAR S31</option>
                                            <option value="HONOR 200 5G 12+256GB" data-valor="$2,399,935">HONOR 200 5G
                                                12+256GB</option>
                                            <option value="HONOR 50 LITE 128GB" data-valor="$835,935">HONOR 50 LITE 128GB
                                            </option>
                                            <option value="HONOR 90 5G 256GB" data-valor="$2,659,934">HONOR 90 5G 256GB
                                            </option>
                                            <option value="HONOR 90 LITE 5G 256GB" data-valor="$1,799,935">HONOR 90 LITE
                                                5G 256GB</option>
                                            <option value="HONOR MAGIC 7 LITE 5G 8+512GB" data-valor="$2,099,935">HONOR
                                                MAGIC 7 LITE 5G 8+512GB</option>
                                            <option value="HONOR X5B 4+128GB" data-valor="$449,950">HONOR X5B 4+128GB
                                            </option>
                                            <option value="HONOR X6A 4+128GB" data-valor="$399,935">HONOR X6A 4+128GB
                                            </option>
                                            <option value="HONOR X6S 128GB" data-valor="$479,950">HONOR X6S 128GB</option>
                                            <option value="HONOR X7 128GB" data-valor="$249,950">HONOR X7 128GB</option>
                                            <option value="HONOR X7A 128GB" data-valor="$629,935">HONOR X7A 128GB</option>
                                            <option value="HONOR X7B 8+256GB" data-valor="$699,935">HONOR X7B 8+256GB
                                            </option>
                                            <option value="HONOR X8 128GB" data-valor="$379,950">HONOR X8 128GB</option>
                                            <option value="HONOR X8A 8+128GB" data-valor="$599,935">HONOR X8A 8+128GB
                                            </option>
                                            <option value="HONOR X8B 5G 8+256GB" data-valor="$899,935">HONOR X8B 5G
                                                8+256GB</option>
                                            <option value="HONOR X8C 8+256GB 4G" data-valor="$1,094,935">HONOR X8C 8+256GB
                                                4G</option>
                                            <option value="HONOR X8C 8+512GB 4G" data-valor="$1,094,935">HONOR X8C 8+512GB
                                                4G</option>
                                            <option value="HONOR X9 128GB" data-valor="$932,935">HONOR X9 128GB</option>

                                            <!-- iPhones adicionales -->
                                            <option value="IPHONE 11 128GB" data-valor="$1,799,929">IPHONE 11 128GB
                                            </option>
                                            <option value="IPHONE 11 256GB" data-valor="$4,019,928">IPHONE 11 256GB
                                            </option>
                                            <option value="IPHONE 11 64GB" data-valor="$999,935">IPHONE 11 64GB</option>
                                            <option value="IPHONE 11 PRO 64GB" data-valor="$4,849,928">IPHONE 11 PRO 64GB
                                            </option>
                                            <option value="IPHONE 12 128GB" data-valor="$2,299,928">IPHONE 12 128GB
                                            </option>
                                            <option value="IPHONE 12 256GB" data-valor="$2,699,929">IPHONE 12 256GB
                                            </option>
                                            <option value="IPHONE 12 64GB" data-valor="$1,999,929">IPHONE 12 64GB</option>
                                            <option value="IPHONE 12 MINI 128GB" data-valor="$1,699,929">IPHONE 12 MINI
                                                128GB</option>
                                            <option value="IPHONE 12 MINI 64GB" data-valor="$1,399,929">IPHONE 12 MINI
                                                64GB</option>
                                            <option value="IPHONE 12 PRO 128GB" data-valor="$2,999,929">IPHONE 12 PRO
                                                128GB</option>
                                            <option value="IPHONE 13 256GB" data-valor="$2,549,928">IPHONE 13 256GB
                                            </option>
                                            <option value="IPHONE 13 512GB" data-valor="$3,099,929">IPHONE 13 512GB
                                            </option>
                                            <option value="IPHONE 13 MINI 128GB" data-valor="$3,699,929">IPHONE 13 MINI
                                                128GB</option>
                                            <option value="IPHONE 13 PRO 128GB" data-valor="$2,599,929">IPHONE 13 PRO
                                                128GB</option>
                                            <option value="IPHONE 13 PRO 1TB" data-valor="$3,899,929">IPHONE 13 PRO 1TB
                                            </option>
                                            <option value="IPHONE 13 PRO MAX 128GB" data-valor="$4,999,929">IPHONE 13 PRO
                                                MAX 128GB</option>
                                            <option value="IPHONE 13 PRO MAX 256GB" data-valor="$4,099,928">IPHONE 13 PRO
                                                MAX 256GB</option>
                                            <option value="IPHONE 14 128GB" data-valor="$6,399,928">IPHONE 14 128GB
                                            </option>
                                            <option value="IPHONE 14 256GB" data-valor="$3,209,929">IPHONE 14 256GB
                                            </option>
                                            <option value="IPHONE 14 PLUS 128GB" data-valor="$3,409,930">IPHONE 14 PLUS
                                                128GB</option>
                                            <option value="IPHONE 14 PLUS 256GB" data-valor="$3,609,929">IPHONE 14 PLUS
                                                256GB</option>
                                            <option value="IPHONE 14 PRO 128GB" data-valor="$3,809,929">IPHONE 14 PRO
                                                128GB</option>
                                            <option value="IPHONE 14 PRO 512GB" data-valor="$4,099,928">IPHONE 14 PRO
                                                512GB</option>
                                            <option value="IPHONE 14 PRO MAX 128GB" data-valor="$5,999,929">IPHONE 14 PRO
                                                MAX 128GB</option>
                                            <option value="IPHONE 15 PLUS 128GB" data-valor="$5,099,929">IPHONE 15 PLUS
                                                128GB</option>
                                            <option value="IPHONE 15 PRO 128GB" data-valor="$3,980,928">IPHONE 15 PRO
                                                128GB</option>
                                            <option value="IPHONE 15 PRO 256GB" data-valor="$5,117,928">IPHONE 15 PRO
                                                256GB</option>
                                            <option value="IPHONE 16 128GB" data-valor="$4,509,929">IPHONE 16 128GB
                                            </option>
                                            <option value="IPHONE 16 256GB" data-valor="$4,999,929">IPHONE 16 256GB
                                            </option>
                                            <option value="IPHONE 16 512GB" data-valor="$5,999,929">IPHONE 16 512GB
                                            </option>
                                            <option value="IPHONE 16 PLUS 128GB" data-valor="$4,539,929">IPHONE 16 PLUS
                                                128GB</option>
                                            <option value="IPHONE 16 PLUS 256GB" data-valor="$5,109,928">IPHONE 16 PLUS
                                                256GB</option>
                                            <option value="IPHONE 16 PLUS 512GB" data-valor="$6,249,929">IPHONE 16 PLUS
                                                512GB</option>
                                            <option value="IPHONE 16 PRO 128GB" data-valor="$5,119,929">IPHONE 16 PRO
                                                128GB</option>
                                            <option value="IPHONE 16 PRO 1TB" data-valor="$5,679,928">IPHONE 16 PRO 1TB
                                            </option>
                                            <option value="IPHONE 16 PRO 256GB" data-valor="$6,819,928">IPHONE 16 PRO
                                                256GB</option>
                                            <option value="IPHONE 16 PRO 512GB" data-valor="$5,689,928">IPHONE 16 PRO
                                                512GB</option>
                                            <option value="IPHONE 16 PRO MAX 1TB" data-valor="$8,519,929">IPHONE 16 PRO
                                                MAX 1TB</option>
                                            <option value="IPHONE 16 PRO MAX 256GB" data-valor="$6,249,929">IPHONE 16 PRO
                                                MAX 256GB</option>
                                            <option value="IPHONE 16 PRO MAX 512GB" data-valor="$7,389,929">IPHONE 16 PRO
                                                MAX 512GB</option>
                                            <option value="IPHONE 7 32GB" data-valor="$1,649,949">IPHONE 7 32GB</option>
                                            <option value="IPHONE SE 64GB" data-valor="$1,999,928">IPHONE SE 64GB</option>
                                            <option value="IPHONE XR 64GB" data-valor="$2,799,928">IPHONE XR 64GB</option>

                                            <!-- Motorola adicionales -->
                                            <option value="MOTO C" data-valor="$229,950">MOTO C</option>
                                            <option value="MOTO E PLUS" data-valor="$299,900">MOTO E PLUS</option>
                                            <option value="MOTO E13 64GB" data-valor="$99,909">MOTO E13 64GB</option>
                                            <option value="MOTO E20 32GB" data-valor="$474,950">MOTO E20 32GB</option>
                                            <option value="MOTO E22I 64GB" data-valor="$599,950">MOTO E22I 64GB</option>
                                            <option value="MOTO E32 64GB" data-valor="$659,909">MOTO E32 64GB</option>
                                            <option value="MOTO E40 64GB" data-valor="$579,950">MOTO E40 64GB</option>
                                            <option value="MOTO E5 PLUS" data-valor="$399,950">MOTO E5 PLUS</option>
                                            <option value="MOTO E6 PLAY" data-valor="$299,950">MOTO E6 PLAY</option>
                                            <option value="MOTO E6 PLUS 64 GB" data-valor="$499,950">MOTO E6 PLUS 64 GB
                                            </option>
                                            <option value="MOTO E7 32 GB LTE" data-valor="$379,950">MOTO E7 32 GB LTE
                                            </option>
                                            <option value="MOTO E7 PLUS" data-valor="$409,950">MOTO E7 PLUS</option>
                                            <option value="MOTO E7i POWER" data-valor="$349,950">MOTO E7i POWER</option>
                                            <option value="MOTO EDGE 20 LITE" data-valor="$932,909">MOTO EDGE 20 LITE
                                            </option>
                                            <option value="MOTO EDGE 30 FUSION 5G 256G" data-valor="$1,303,909">MOTO EDGE
                                                30 FUSION 5G 256G</option>
                                            <option value="MOTO EDGE 30 NEO 128GB" data-valor="$899,909">MOTO EDGE 30 NEO
                                                128GB</option>
                                            <option value="MOTO EDGE 30 PRO 5G" data-valor="$1,999,909">MOTO EDGE 30 PRO
                                                5G</option>
                                            <option value="MOTO EDGE 30 ULTRA 5G 12+256G" data-valor="$1,303,909">MOTO
                                                EDGE 30 ULTRA 5G 12+256G</option>
                                            <option value="MOTO EDGE 40 5G 256GB" data-valor="$1,499,909">MOTO EDGE 40 5G
                                                256GB</option>
                                            <option value="MOTO EDGE 50 FUSION 5G 12+512GB" data-valor="$1,599,909">MOTO
                                                EDGE 50 FUSION 5G 12+512GB</option>
                                            <option value="MOTO G 4A PLUS" data-valor="$499,900">MOTO G 4A PLUS</option>
                                            <option value="MOTO G04 4+128GB" data-valor="$479,950">MOTO G04 4+128GB
                                            </option>
                                            <option value="MOTO G04S 4+128GB" data-valor="$399,909">MOTO G04S 4+128GB
                                            </option>
                                            <option value="MOTO G14 4+128GB" data-valor="$399,909">MOTO G14 4+128GB
                                            </option>
                                            <option value="MOTO G20 128GB" data-valor="$529,909">MOTO G20 128GB</option>
                                            <option value="MOTO G200 8+128GB" data-valor="$1,303,909">MOTO G200 8+128GB
                                            </option>
                                            <option value="MOTO G22 128GB" data-valor="$774,909">MOTO G22 128GB</option>
                                            <option value="MOTO G23 128GB" data-valor="$399,909">MOTO G23 128GB</option>
                                            <option value="MOTO G24 4+256GB" data-valor="$499,909">MOTO G24 4+256GB
                                            </option>
                                            <option value="MOTO G30 128GB" data-valor="$599,950">MOTO G30 128GB</option>
                                            <option value="MOTO G31 128GB" data-valor="$449,909">MOTO G31 128GB</option>
                                            <option value="MOTO G34 5G 8+256GB" data-valor="$649,909">MOTO G34 5G 8+256GB
                                            </option>
                                            <option value="MOTO G41 128GB" data-valor="$773,909">MOTO G41 128GB</option>
                                            <option value="MOTO G5" data-valor="$449,900">MOTO G5</option>
                                            <option value="MOTO G52 128GB" data-valor="$199,909">MOTO G52 128GB</option>
                                            <option value="MOTO G5S" data-valor="$389,900">MOTO G5S</option>
                                            <option value="MOTO G6" data-valor="$449,900">MOTO G6</option>
                                            <option value="MOTO G60 128GB" data-valor="$899,909">MOTO G60 128GB</option>
                                            <option value="MOTO G60S" data-valor="$449,909">MOTO G60S</option>
                                            <option value="MOTO G7" data-valor="$599,950">MOTO G7</option>
                                            <option value="MOTO G8 PLUS" data-valor="$699,909">MOTO G8 PLUS</option>
                                            <option value="MOTO G84 8+256GB" data-valor="$699,909">MOTO G84 8+256GB
                                            </option>
                                            <option value="MOTO G9 PLAY" data-valor="$449,950">MOTO G9 PLAY</option>
                                            <option value="MOTO G9 PLUS" data-valor="$649,909">MOTO G9 PLUS</option>
                                            <option value="MOTO ONE FUSION" data-valor="$549,950">MOTO ONE FUSION</option>
                                            <option value="MOTO ONE FUSION 128 GB" data-valor="$69,950">MOTO ONE FUSION
                                                128 GB</option>
                                            <option value="MOTO ONE MACRO" data-valor="$479,950">MOTO ONE MACRO</option>
                                            <option value="MOTO RAZR 50 12+512GB" data-valor="$3,799,909">MOTO RAZR 50
                                                12+512GB</option>

                                            <!-- Nokia -->
                                            <option value="NOKIA 1 PLUS" data-valor="$229,909">NOKIA 1 PLUS</option>
                                            <option value="NOKIA 1.3" data-valor="$229,950">NOKIA 1.3</option>
                                            <option value="NOKIA 1.4" data-valor="$549,909">NOKIA 1.4</option>
                                            <option value="NOKIA 2.3" data-valor="$549,949">NOKIA 2.3</option>
                                            <option value="NOKIA 3.1" data-valor="$199,950">NOKIA 3.1</option>
                                            <option value="NOKIA 3.4" data-valor="$319,950">NOKIA 3.4</option>
                                            <option value="NOKIA 5.1" data-valor="$359,950">NOKIA 5.1</option>
                                            <option value="NOKIA 5.3" data-valor="$369,950">NOKIA 5.3</option>
                                            <option value="NOKIA 5.4" data-valor="$499,950">NOKIA 5.4</option>
                                            <option value="NOKIA 6" data-valor="$491,950">NOKIA 6</option>
                                            <option value="NOKIA 6.2" data-valor="$539,950">NOKIA 6.2</option>
                                            <option value="NOKIA C01 PLUS" data-valor="$599,950">NOKIA C01 PLUS</option>
                                            <option value="NOKIA C1 PLUS" data-valor="$669,869">NOKIA C1 PLUS</option>
                                            <option value="NOKIA C3" data-valor="$519,950">NOKIA C3</option>
                                            <option value="NOKIA G10" data-valor="$699,950">NOKIA G10</option>
                                            <option value="NOKIA G20" data-valor="$249,950">NOKIA G20</option>
                                            <option value="NOKIA G21+ 128GB" data-valor="$241,950">NOKIA G21+ 128GB
                                            </option>
                                            <option value="NOKIA G50 5G 128GB" data-valor="$332,950">NOKIA G50 5G 128GB
                                            </option>
                                            <option value="NOKIA XR20" data-valor="$519,950">NOKIA XR20</option>

                                            <!-- OPPO adicionales -->
                                            <option value="OPPO A16 64GB" data-valor="$409,950">OPPO A16 64GB</option>
                                            <option value="OPPO A17" data-valor="$589,950">OPPO A17</option>
                                            <option value="OPPO A38 4+128GB" data-valor="$899,869">OPPO A38 4+128GB
                                            </option>
                                            <option value="OPPO A40 4+256GB" data-valor="$1,303,869">OPPO A40 4+256GB
                                            </option>
                                            <option value="OPPO A5 PRO 5G 8+256GB" data-valor="$599,950">OPPO A5 PRO 5G
                                                8+256GB</option>
                                            <option value="OPPO A54 128GB" data-valor="$399,839">OPPO A54 128GB</option>
                                            <option value="OPPO A57 128GB" data-valor="$679,839">OPPO A57 128GB</option>
                                            <option value="OPPO A58 256+6" data-valor="$1,698,839">OPPO A58 256+6</option>
                                            <option value="OPPO A58 6+128GB" data-valor="$763,839">OPPO A58 6+128GB
                                            </option>
                                            <option value="OPPO A60 8+256GB" data-valor="$499,839">OPPO A60 8+256GB
                                            </option>
                                            <option value="OPPO A77 128GB" data-valor="$649,839">OPPO A77 128GB</option>
                                            <option value="OPPO A78 256GB" data-valor="$749,839">OPPO A78 256GB</option>
                                            <option value="OPPO A79 5G 8 +256" data-valor="$799,839">OPPO A79 5G 8 +256
                                            </option>
                                            <option value="OPPO RENO 10 256GB" data-valor="$842,839">OPPO RENO 10 256GB
                                            </option>
                                            <option value="OPPO RENO 11 5G" data-valor="$1,034,839">OPPO RENO 11 5G
                                            </option>
                                            <option value="OPPO RENO 11F 5G" data-valor="$799,839">OPPO RENO 11F 5G
                                            </option>
                                            <option value="OPPO RENO 12 5G 12+512GB" data-valor="$1,094,839">OPPO RENO 12
                                                5G 12+512GB</option>
                                            <option value="OPPO RENO 12F 5G 12+256GB" data-valor="$1,599,840">OPPO RENO
                                                12F 5G 12+256GB</option>
                                            <option value="OPPO RENO 13 F 5G 12+512 GB" data-valor="$2,499,839">OPPO RENO
                                                13 F 5G 12+512 GB</option>
                                            <option value="OPPO RENO 6 LITE" data-valor="$1,599,840">OPPO RENO 6 LITE
                                            </option>
                                            <option value="OPPO RENO 7 128GB" data-valor="$3,499,839">OPPO RENO 7 128GB
                                            </option>
                                            <option value="OPPO RENO 7 256GB" data-valor="$2,499,839">OPPO RENO 7 256GB
                                            </option>

                                            <!-- Samsung adicionales -->
                                            <option value="SAMSUNG A01" data-valor="$932,839">SAMSUNG A01</option>
                                            <option value="SAMSUNG A01 CORE" data-valor="$1,439,838">SAMSUNG A01 CORE
                                            </option>
                                            <option value="SAMSUNG A02 32GB" data-valor="$1,034,839">SAMSUNG A02 32GB
                                            </option>
                                            <option value="SAMSUNG A02S 64GB" data-valor="$2,499,828">SAMSUNG A02S 64GB
                                            </option>
                                            <option value="SAMSUNG A03 32GB" data-valor="$1,034,950">SAMSUNG A03 32GB
                                            </option>
                                            <option value="SAMSUNG A03 64GB" data-valor="$1,094,949">SAMSUNG A03 64GB
                                            </option>
                                            <option value="SAMSUNG A03 CORE" data-valor="$1,829,950">SAMSUNG A03 CORE
                                            </option>
                                            <option value="SAMSUNG A03S" data-valor="$1,929,949">SAMSUNG A03S</option>
                                            <option value="SAMSUNG A10" data-valor="$1,439,858">SAMSUNG A10</option>
                                            <option value="SAMSUNG A11" data-valor="$999,859">SAMSUNG A11</option>
                                            <option value="SAMSUNG A12 128GB" data-valor="$669,859">SAMSUNG A12 128GB
                                            </option>
                                            <option value="SAMSUNG A12 64GB" data-valor="$429,950">SAMSUNG A12 64GB
                                            </option>
                                            <option value="SAMSUNG A13 128GB" data-valor="$749,859">SAMSUNG A13 128GB
                                            </option>
                                            <option value="SAMSUNG A13 64GB" data-valor="$249,859">SAMSUNG A13 64GB
                                            </option>
                                            <option value="SAMSUNG A20" data-valor="$839,859">SAMSUNG A20</option>
                                            <option value="SAMSUNG A20S" data-valor="$399,859">SAMSUNG A20S</option>
                                            <option value="SAMSUNG A21S" data-valor="$672,950">SAMSUNG A21S</option>
                                            <option value="SAMSUNG A21S 128GB" data-valor="$369,950">SAMSUNG A21S 128GB
                                            </option>
                                            <option value="SAMSUNG A22 128GB" data-valor="$299,950">SAMSUNG A22 128GB
                                            </option>
                                            <option value="SAMSUNG A22 5G 128GB" data-valor="$399,950">SAMSUNG A22 5G
                                                128GB</option>
                                            <option value="SAMSUNG A23 128GB" data-valor="$499,950">SAMSUNG A23 128GB
                                            </option>
                                            <option value="SAMSUNG A24 128GB" data-valor="$220,950">SAMSUNG A24 128GB
                                            </option>
                                            <option value="SAMSUNG A26 8+256GB 5G" data-valor="$309,939">SAMSUNG A26
                                                8+256GB 5G</option>
                                            <option value="SAMSUNG A30" data-valor="$389,939">SAMSUNG A30</option>
                                            <option value="SAMSUNG A30S" data-valor="$579,939">SAMSUNG A30S</option>
                                            <option value="SAMSUNG A31 128 GB" data-valor="$379,950">SAMSUNG A31 128 GB
                                            </option>
                                            <option value="SAMSUNG A32" data-valor="$499,950">SAMSUNG A32</option>
                                            <option value="SAMSUNG A33 5G 128GB" data-valor="$649,939">SAMSUNG A33 5G
                                                128GB</option>
                                            <option value="SAMSUNG A34 5G 128GB" data-valor="$549,950">SAMSUNG A34 5G
                                                128GB</option>
                                            <option value="SAMSUNG A35 5G 8+256GB" data-valor="$749,939">SAMSUNG A35 5G
                                                8+256GB</option>
                                            <option value="SAMSUNG A36 5G 8+256GB" data-valor="$649,939">SAMSUNG A36 5G
                                                8+256GB</option>
                                            <option value="SAMSUNG A5 2017" data-valor="$419,950">SAMSUNG A5 2017</option>
                                            <option value="SAMSUNG A50" data-valor="$399,950">SAMSUNG A50</option>
                                            <option value="SAMSUNG A51" data-valor="$649,939">SAMSUNG A51</option>
                                            <option value="SAMSUNG A52" data-valor="$699,939">SAMSUNG A52</option>
                                            <option value="SAMSUNG A53 5G 128GB" data-valor="$849,939">SAMSUNG A53 5G
                                                128GB</option>
                                            <option value="SAMSUNG A54 5G 128GB" data-valor="$899,939">SAMSUNG A54 5G
                                                128GB</option>
                                            <option value="SAMSUNG A55 5G 8+256GB" data-valor="$1,999,939">SAMSUNG A55 5G
                                                8+256GB</option>
                                            <option value="SAMSUNG A56 5G 8+256GB" data-valor="$999,939">SAMSUNG A56 5G
                                                8+256GB</option>
                                            <option value="SAMSUNG A71" data-valor="$1,094,939">SAMSUNG A71</option>
                                            <option value="SAMSUNG A72" data-valor="$499,950">SAMSUNG A72</option>
                                            <option value="SAMSUNG GALAXY A04 64GB" data-valor="$549,950">SAMSUNG GALAXY
                                                A04 64GB</option>
                                            <option value="SAMSUNG GALAXY A04E 32GB" data-valor="$797,939">SAMSUNG GALAXY
                                                A04E 32GB</option>
                                            <option value="SAMSUNG GALAXY A04S 128GB" data-valor="$919,939">SAMSUNG GALAXY
                                                A04S 128GB</option>
                                            <option value="SAMSUNG GALAXY A05 4+128GB" data-valor="$1,499,939">SAMSUNG
                                                GALAXY A05 4+128GB</option>
                                            <option value="SAMSUNG GALAXY A05 4+64GB" data-valor="$499,939">SAMSUNG GALAXY
                                                A05 4+64GB</option>
                                            <option value="SAMSUNG GALAXY A05S 4+128GB" data-valor="$1,094,939">SAMSUNG
                                                GALAXY A05S 4+128GB</option>
                                            <option value="SAMSUNG GALAXY A06 128GB" data-valor="$1,549,939">SAMSUNG
                                                GALAXY A06 128GB</option>
                                            <option value="SAMSUNG GALAXY A14 128GB" data-valor="$1,699,939">SAMSUNG
                                                GALAXY A14 128GB</option>
                                            <option value="SAMSUNG GALAXY A15 8+256GB" data-valor="$718,900">SAMSUNG
                                                GALAXY A15 8+256GB</option>
                                            <option value="SAMSUNG GALAXY A16 5G 8+256GB" data-valor="$984,939">SAMSUNG
                                                GALAXY A16 5G 8+256GB</option>
                                            <option value="SAMSUNG GALAXY A25 6+128GB 5G" data-valor="$1,303,939">SAMSUNG
                                                GALAXY A25 6+128GB 5G</option>
                                            <option value="SAMSUNG GALAXY A25 8+256GB 5G" data-valor="$1,399,939">SAMSUNG
                                                GALAXY A25 8+256GB 5G</option>
                                            <option value="SAMSUNG GALAXY S23 256GB" data-valor="$1,799,939">SAMSUNG
                                                GALAXY S23 256GB</option>
                                            <option value="SAMSUNG GALAXY S23 FE 256GB" data-valor="$2,399,938">SAMSUNG
                                                GALAXY S23 FE 256GB</option>
                                            <option value="SAMSUNG GALAXY S23 ULTRA 256GB" data-valor="$1,799,939">SAMSUNG
                                                GALAXY S23 ULTRA 256GB</option>
                                            <option value="SAMSUNG GALAXY S23+ 512GB" data-valor="$2,199,939">SAMSUNG
                                                GALAXY S23+ 512GB</option>
                                            <option value="SAMSUNG GALAXY S24 8+128GB 5G" data-valor="$2,199,939">SAMSUNG
                                                GALAXY S24 8+128GB 5G</option>
                                            <option value="SAMSUNG GALAXY S24 8+256GB 5G" data-valor="$1,529,939">SAMSUNG
                                                GALAXY S24 8+256GB 5G</option>
                                            <option value="SAMSUNG GALAXY S24 FE 5G 8+256GB" data-valor="$1,499,938">
                                                SAMSUNG GALAXY S24 FE 5G 8+256GB</option>
                                            <option value="SAMSUNG GALAXY S24 ULTRA 12+256GB 5G" data-valor="$249,950">
                                                SAMSUNG GALAXY S24 ULTRA 12+256GB 5G</option>
                                            <option value="SAMSUNG GALAXY S24 ULTRA 12+512GB 5G" data-valor="$329,939">
                                                SAMSUNG GALAXY S24 ULTRA 12+512GB 5G</option>
                                            <option value="SAMSUNG GALAXY S24+ 12+256GB 5G" data-valor="$94,939">SAMSUNG
                                                GALAXY S24+ 12+256GB 5G</option>
                                            <option value="SAMSUNG GALAXY S25+ 5G 256GB" data-valor="$599,939">SAMSUNG
                                                GALAXY S25+ 5G 256GB</option>
                                            <option value="SAMSUNG GALAXY Z FLIP5 256GB" data-valor="$449,939">SAMSUNG
                                                GALAXY Z FLIP5 256GB</option>
                                            <option value="SAMSUNG GALAXY Z FLIP5 512GB" data-valor="$679,939">SAMSUNG
                                                GALAXY Z FLIP5 512GB</option>
                                            <option value="SAMSUNG GALAXY Z FLIP6 256GB" data-valor="$449,939">SAMSUNG
                                                GALAXY Z FLIP6 256GB</option>
                                            <option value="SAMSUNG GALAXY Z FOLD5 256GB" data-valor="$559,939">SAMSUNG
                                                GALAXY Z FOLD5 256GB</option>
                                            <option value="SAMSUNG GALAXY Z FOLD5 512GB" data-valor="$459,939">SAMSUNG
                                                GALAXY Z FOLD5 512GB</option>
                                            <option value="SAMSUNG J1 ACE DS" data-valor="$759,939">SAMSUNG J1 ACE DS
                                            </option>
                                            <option value="SAMSUNG J2 PRIME" data-valor="$749,939">SAMSUNG J2 PRIME
                                            </option>
                                            <option value="SAMSUNG J5 PRIME" data-valor="$819,939">SAMSUNG J5 PRIME
                                            </option>
                                            <option value="SAMSUNG J7 PRIME 32" data-valor="$909,939">SAMSUNG J7 PRIME 32
                                            </option>
                                            <option value="SAMSUNG S20 FE" data-valor="$869,939">SAMSUNG S20 FE</option>
                                            <option value="SAMSUNG S20 FE 5G 128GB" data-valor="$4,429,938">SAMSUNG S20 FE
                                                5G 128GB</option>
                                            <option value="SAMSUNG S21 256GB" data-valor="$2,899,940">SAMSUNG S21 256GB
                                            </option>
                                            <option value="SAMSUNG S21 FE 256GB" data-valor="$6,999,939">SAMSUNG S21 FE
                                                256GB</option>
                                            <option value="SAMSUNG S22 128GB" data-valor="$6,199,939">SAMSUNG S22 128GB
                                            </option>
                                            <option value="SAMSUNG S22 256GB" data-valor="$4,199,938">SAMSUNG S22 256GB
                                            </option>
                                            <option value="SAMSUNG S22 ULTRA 256GB" data-valor="$4,009,939">SAMSUNG S22
                                                ULTRA 256GB</option>
                                            <option value="SAMSUNG S22+ 256GB" data-valor="$2,599,939">SAMSUNG S22+ 256GB
                                            </option>
                                            <option value="SAMSUNG Z FLIP 4 256GB" data-valor="$5,299,939">SAMSUNG Z FLIP
                                                4 256GB</option>
                                            <option value="SAMSUNG Z FOLD 4 256GB" data-valor="$6,769,939">SAMSUNG Z FOLD
                                                4 256GB</option>

                                            <!-- VIVO adicionales -->
                                            <option value="VIVO V21" data-valor="$4,999,939">VIVO V21</option>
                                            <option value="VIVO V25 5G 128GB" data-valor="$4,899,939">VIVO V25 5G 128GB
                                            </option>
                                            <option value="VIVO V25 PRO 5G 256GB" data-valor="$6,999,939">VIVO V25 PRO 5G
                                                256GB</option>
                                            <option value="VIVO V25E 8+256GB" data-valor="$5,549,939">VIVO V25E 8+256GB
                                            </option>
                                            <option value="VIVO V30 5G 12+512GB" data-valor="$2,998,939">VIVO V30 5G
                                                12+512GB</option>
                                            <option value="VIVO V30 LITE 5G 12+256GB" data-valor="$5,959,939">VIVO V30
                                                LITE 5G 12+256GB</option>
                                            <option value="VIVO V40 5G 12+512GB" data-valor="$5,999,940">VIVO V40 5G
                                                12+512GB</option>
                                            <option value="VIVO V40SE 5G 8+256GB" data-valor="$8,119,939">VIVO V40SE 5G
                                                8+256GB</option>
                                            <option value="VIVO V50 12+512GB 5G" data-valor="$9,919,939">VIVO V50 12+512GB
                                                5G</option>
                                            <option value="VIVO Y01 32GB" data-valor="$99,900">VIVO Y01 32GB</option>
                                            <option value="VIVO Y03 4+128GB" data-valor="$199,900">VIVO Y03 4+128GB
                                            </option>
                                            <option value="VIVO Y04 4+128GB" data-valor="$399,900">VIVO Y04 4+128GB
                                            </option>
                                            <option value="VIVO Y11S" data-valor="$529,900">VIVO Y11S</option>
                                            <option value="VIVO Y15S 64GB" data-valor="$2,254,938">VIVO Y15S 64GB</option>
                                            <option value="VIVO Y16 128GB" data-valor="$2,499,939">VIVO Y16 128GB</option>
                                            <option value="VIVO Y17S 4+128G" data-valor="$3,599,938">VIVO Y17S 4+128G
                                            </option>
                                            <option value="VIVO Y19S 6+256GB" data-valor="$2,399,938">VIVO Y19S 6+256GB
                                            </option>
                                            <option value="VIVO Y20 128GB" data-valor="$3,746,939">VIVO Y20 128GB</option>
                                            <option value="VIVO Y20S 128GB" data-valor="$5,499,938">VIVO Y20S 128GB
                                            </option>
                                            <option value="VIVO Y21S 128GB" data-valor="$4,999,939">VIVO Y21S 128GB
                                            </option>
                                            <option value="VIVO Y22S 4-128GB" data-valor="$679,939">VIVO Y22S 4-128GB
                                            </option>
                                            <option value="VIVO Y22S 6-128GB" data-valor="$699,939">VIVO Y22S 6-128GB
                                            </option>
                                            <option value="VIVO Y27 6+128G" data-valor="$880,527">VIVO Y27 6+128G</option>
                                            <option value="VIVO Y27S 8+256GB" data-valor="$5,299,939">VIVO Y27S 8+256GB
                                            </option>
                                            <option value="VIVO Y33S" data-valor="$8,399,939">VIVO Y33S</option>
                                            <option value="VIVO Y35 128GB" data-valor="$1,094,900">VIVO Y35 128GB</option>
                                            <option value="VIVO Y36 8+128GB" data-valor="$799,900">VIVO Y36 8+128GB
                                            </option>
                                            <option value="VIVO Y39 8+256GB 5G" data-valor="$691,900">VIVO Y39 8+256GB 5G
                                            </option>
                                            <option value="VIVO Y51" data-valor="$932,879">VIVO Y51</option>
                                            <option value="VIVO Y53S" data-valor="$2,499,879">VIVO Y53S</option>

                                            <!-- XIAOMI adicionales -->
                                            <option value="XIAOMI 11 LITE 5G NE 128GB" data-valor="$1,094,879">XIAOMI 11
                                                LITE 5G NE 128GB</option>
                                            <option value="XIAOMI 11T" data-valor="$2,199,879">XIAOMI 11T</option>
                                            <option value="XIAOMI 11T PRO 256GB" data-valor="$1,899,879">XIAOMI 11T PRO
                                                256GB</option>
                                            <option value="XIAOMI 12 5G 256GB" data-valor="$1,999,879">XIAOMI 12 5G 256GB
                                            </option>
                                            <option value="XIAOMI 12 LITE 5G 128GB" data-valor="$1,549,879">XIAOMI 12 LITE
                                                5G 128GB</option>
                                            <option value="XIAOMI 12T PRO 5G 256GB" data-valor="$3,199,879">XIAOMI 12T PRO
                                                5G 256GB</option>
                                            <option value="XIAOMI 13T 5G 256GB" data-valor="$269,950">XIAOMI 13T 5G 256GB
                                            </option>
                                            <option value="XIAOMI 14T 12+512GB" data-valor="$449,879">XIAOMI 14T 12+512GB
                                            </option>
                                            <option value="XIAOMI 14T PRO 12+512GB" data-valor="$529,879">XIAOMI 14T PRO
                                                12+512GB</option>
                                            <option value="XIAOMI 15 5G 12+512GB" data-valor="$299,950">XIAOMI 15 5G
                                                12+512GB</option>
                                            <option value="XIAOMI MI 11 LITE 5G" data-valor="$399,950">XIAOMI MI 11 LITE
                                                5G</option>
                                            <option value="XIAOMI NOTE 10 5G" data-valor="$799,879">XIAOMI NOTE 10 5G
                                            </option>
                                            <option value="XIAOMI NOTE 10 PRO" data-valor="$699,879">XIAOMI NOTE 10 PRO
                                            </option>
                                            <option value="XIAOMI NOTE 10S" data-valor="$709,879">XIAOMI NOTE 10S</option>
                                            <option value="XIAOMI NOTE 11 128GB" data-valor="$729,879">XIAOMI NOTE 11
                                                128GB</option>
                                            <option value="XIAOMI NOTE 11 PRO 5G 128GB" data-valor="$529,950">XIAOMI NOTE
                                                11 PRO 5G 128GB</option>
                                            <option value="XIAOMI NOTE 11S 128GB" data-valor="$499,950">XIAOMI NOTE 11S
                                                128GB</option>
                                            <option value="XIAOMI NOTE 12 128GB" data-valor="$849,879">XIAOMI NOTE 12
                                                128GB</option>
                                            <option value="XIAOMI NOTE 12 PRO+ 256GB 5G" data-valor="$749,879">XIAOMI NOTE
                                                12 PRO+ 256GB 5G</option>
                                            <option value="XIAOMI NOTE 12S 8+256GB" data-valor="$299,879">XIAOMI NOTE 12S
                                                8+256GB</option>
                                            <option value="XIAOMI REDMI 10 128GB" data-valor="$699,879">XIAOMI REDMI 10
                                                128GB</option>
                                            <option value="XIAOMI REDMI 10 2022 128GB" data-valor="$929,879">XIAOMI REDMI
                                                10 2022 128GB</option>
                                            <option value="XIAOMI REDMI 10 64GB" data-valor="$899,879">XIAOMI REDMI 10
                                                64GB</option>
                                            <option value="XIAOMI REDMI 10A 32GB" data-valor="$1,799,879">XIAOMI REDMI 10A
                                                32GB</option>
                                            <option value="XIAOMI REDMI 10C 128GB" data-valor="$499,879">XIAOMI REDMI 10C
                                                128GB</option>
                                            <option value="XIAOMI REDMI 10C 64GB" data-valor="$899,879">XIAOMI REDMI 10C
                                                64GB</option>
                                            <option value="XIAOMI REDMI 10C LTE 64GB" data-valor="$1,094,879">XIAOMI REDMI
                                                10C LTE 64GB</option>
                                            <option value="XIAOMI REDMI 12 256GB" data-valor="$629,879">XIAOMI REDMI 12
                                                256GB</option>
                                            <option value="XIAOMI REDMI 12C 4+128GB" data-valor="$899,879">XIAOMI REDMI
                                                12C 4+128GB</option>
                                            <option value="XIAOMI REDMI 13C 4+128GB" data-valor="$649,889">XIAOMI REDMI
                                                13C 4+128GB</option>
                                            <option value="XIAOMI REDMI 13C 8+256GB" data-valor="$1,303,889">XIAOMI REDMI
                                                13C 8+256GB</option>
                                            <option value="XIAOMI REDMI 14C 4+128GB" data-valor="$2,409,888">XIAOMI REDMI
                                                14C 4+128GB</option>
                                            <option value="XIAOMI REDMI 14C 4+256GB" data-valor="$3,579,889">XIAOMI REDMI
                                                14C 4+256GB</option>
                                            <option value="XIAOMI REDMI 9" data-valor="$2,084,888">XIAOMI REDMI 9</option>
                                            <option value="XIAOMI REDMI 9A" data-valor="$2,939,888">XIAOMI REDMI 9A
                                            </option>
                                            <option value="XIAOMI REDMI 9C" data-valor="$2,689,888">XIAOMI REDMI 9C
                                            </option>
                                            <option value="XIAOMI REDMI 9T" data-valor="$2,599,889">XIAOMI REDMI 9T
                                            </option>
                                            <option value="XIAOMI REDMI A2 64GB" data-valor="$2,999,889">XIAOMI REDMI A2
                                                64GB</option>
                                            <option value="XIAOMI REDMI NOTE 13 8+256GB" data-valor="$4,999,889">XIAOMI
                                                REDMI NOTE 13 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 13 PRO 5G 8+256GB" data-valor="$369,889">
                                                XIAOMI REDMI NOTE 13 PRO 5G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 13 PRO 8+256GB" data-valor="$359,889">XIAOMI
                                                REDMI NOTE 13 PRO 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 PRO 5G 8+256GB" data-valor="$1,499,889">
                                                XIAOMI REDMI NOTE 14 PRO 5G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 PRO+ 5G 8+256GB" data-valor="$1,799,889">
                                                XIAOMI REDMI NOTE 14 PRO+ 5G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 5G 13 8+256GB" data-valor="$2,099,889">XIAOMI
                                                REDMI NOTE 5G 13 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 8" data-valor="$799,889">XIAOMI REDMI NOTE 8
                                            </option>
                                            <option value="XIAOMI REDMI NOTE 8 128GB" data-valor="$499,950">XIAOMI REDMI
                                                NOTE 8 128GB</option>
                                            <option value="XIAOMI REDMI NOTE 9" data-valor="$569,950">XIAOMI REDMI NOTE 9
                                            </option>

                                            <!-- Realme -->
                                            <option value="REALME 10 8+256GB" data-valor="$549,950">REALME 10 8+256GB
                                            </option>
                                            <option value="REALME 12 5G 8+256GB" data-valor="$649,889">REALME 12 5G
                                                8+256GB</option>
                                            <option value="REALME 7i 128GB" data-valor="$649,889">REALME 7i 128GB</option>
                                            <option value="REALME C21Y" data-valor="$649,889">REALME C21Y</option>
                                            <option value="REALME C35 128GB" data-valor="$499,889">REALME C35 128GB
                                            </option>
                                            <option value="REALME C53 128GB" data-valor="$499,889">REALME C53 128GB
                                            </option>
                                            <option value="REALME C55 256GB" data-valor="$499,889">REALME C55 256GB
                                            </option>
                                            <option value="REALME C67 8+256GB" data-valor="$499,889">REALME C67 8+256GB
                                            </option>

                                            <!-- Tecno -->
                                            <option value="TECNO CAMON 30S PRO 8+256GB CSG" data-valor="$499,889">TECNO
                                                CAMON 30S PRO 8+256GB CSG</option>
                                            <option value="TECNO SPARK 30 5G 8+256GB CSG" data-valor="$499,889">TECNO
                                                SPARK 30 5G 8+256GB CSG</option>

                                            <!-- Otros -->
                                            <option value="RUGGEAR RG170" data-valor="$191,950">RUGGEAR RG170</option>
                                            <option value="TELO TE580" data-valor="$199,889">TELO TE580</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="valorEquipoOUT"><i class="fas fa-dollar-sign"></i> VALOR DE
                                            EQUIPO</label>
                                        <input type="text" class="form-control" name="valorEquipo2"
                                            id="valorEquipoOUT" readonly>
                                    </div>
                                </div>

                                <div id="reagendamientoInputsOUT" class="col-md-12" style="display: none;">
                                    <div class="form-group mt-3">
                                        <label for="direccionReagendamientoOUT">Dirección de Reagendamiento</label>
                                        <input type="text" class="form-control" name="direccionReagendamiento2"
                                            id="direccionReagendamientoOUT" placeholder="Ingrese la dirección">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="tkReagendamientoOUT"># TK del Reagendamiento</label>
                                        <input type="text" class="form-control" name="tkReagendamiento2"
                                            id="tkReagendamientoOUT" placeholder="Ingrese el número de TK">
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><i class="fas fa-user"></i> OBSERVACIÓN</label>
                                        <input type="text" name="Observacion2" id="observacionOUT"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="simcard2" id="simcardOUT" class="custom-select col-md-12">
                                            <option value="">CAMBIO RECIENTE DE SIMCARD</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fotoOUT1"><i class="fas fa-camera"></i> Print ID VISIÓN</label>
                                        <input type="file" name="idVision2" id="fotoOUT1" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fotoOUT2"><i class="fas fa-camera"></i> Print Reagendamiento</label>
                                        <input type="file" name="reagendamientoImg2" id="fotoOUT2"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div> <!-- FIN contenidoOUT -->

                        <!-- CONTENIDO PARA IN (Todo el formulario existente) -->
                        <div id="contenidoIN" style="display: none;">

                            <!-- AQUÍ VA TODO EL CONTENIDO EXISTENTE DEL FORMULARIO -->
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
                                        <input type="number" name="lineaTitular" class="form-control">
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
                                {{-- Ciudad departamento --}}
                                <div class="form-group col-md-6">
                                    <select name="departamento" id="Tipificacion_detalle_1" class="form-control"
                                        style="border-radius: 10px">
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>
                                <div class="form-group col-md-6">
                                    <select name="ciudad" id="Tipificacion_detalle_2" class="form-control"
                                        style="border-radius: 10px">
                                        <option value="">Ciudad</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>
                                {{-- fin ciudad departamento --}}

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
                                            <option value="ENTREGA_EQUIPO">ENTREGA EQUIPO</option>
                                            <!-- OPCIONES ADICIONALES DE DOCUMENTOS -->
                                            <option value="DOCUMENTO_TITULAR">DOCUMENTO DEL TITULAR NOMBRE LINEA CELULAR
                                            </option>
                                            <option value="DOCUMENTO_TERCERO">DOCUMENTO DEL TERCERO AUTORIZADO NOMBRE
                                                LINEA
                                                CELULAR</option>
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
                                                <input type="number" name="documentoTitular" class="form-control">
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
                                            <option value="NO_EN_PUNTO_ENTREGA">MOTORIZADO NO ESTÁ EN EL PUNTO DE ENTREGA
                                            </option>
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
                                <select name="SubTipificacion" id="tipo_especifico" class="custom-select col-md-6"
                                    style="display: none;">
                                    <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                                </select>

                                <!-- Campo para valor de equipo (para EXITOSA y REAGENDAMIENTO) -->
                                <div id="valorEquipoDiv" class="col-md-12" style="display: none;">
                                    <div class="form-group mt-3">
                                        <label for="modeloEquipo"><i class="fas fa-mobile-alt"></i> MODELO DE
                                            EQUIPO</label>
                                        <select class="form-control" name="modeloEquipo" id="modeloEquipo">
                                            <option value="">Seleccione un modelo</option>
                                            <option value="HONOR 200 SMART 5G 8+256GB" data-valor="$979,935">HONOR 200
                                                SMART 5G 8+256GB</option>
                                            <option value="HONOR MAGIC 6 LITE 8+256GB 5G" data-valor="$1,699,935">HONOR
                                                MAGIC 6 LITE 8+256GB 5G</option>
                                            <option value="HONOR X5B PLUS 4+256GB" data-valor="$499,935">HONOR X5B PLUS
                                                4+256GB</option>
                                            <option value="IPHONE 13 128GB" data-valor="$4,339,929">IPHONE 13 128GB
                                            </option>
                                            <option value="IPHONE 15 128GB" data-valor="$5,029,929">IPHONE 15 128GB
                                            </option>
                                            <option value="IPHONE 15 PRO MAX 256GB" data-valor="$8,238,929">IPHONE 15
                                                PRO MAX 256GB</option>
                                            <option value="IPHONE 15E 128GB" data-valor="$3,238,929">IPHONE 15E 128GB
                                            </option>
                                            <option value="MOTO EDGE 50 FUSION 5G 8+256GB" data-valor="$949,909">MOTO
                                                EDGE 50 FUSION 5G 8+256GB</option>
                                            <option value="MOTO G15 4+256GB" data-valor="$749,839">MOTO G15 4+256GB
                                            </option>
                                            <option value="OPPO A80 8+256GB" data-valor="$999,839">OPPO A80 8+256GB
                                            </option>
                                            <option value="OPPO A80 5G 8+256GB" data-valor="$999,839">OPPO A80 5G
                                                8+256GB</option>
                                            <option value="OPPO RENO 13 5G 12+512 GB" data-valor="$3,299,839">OPPO RENO
                                                13 5G 12+512 GB</option>
                                            <option value="SAMSUNG GALAXY S25 5G 256GB" data-valor="$4,480,939">SAMSUNG
                                                GALAXY S25 5G 256GB</option>
                                            <option value="SAMSUNG GALAXY S25 ULTRA 256GB 5G" data-valor="$6,427,939">
                                                SAMSUNG GALAXY S25 ULTRA 256GB 5G</option>
                                            <option value="VIVO Y18 8+256GB" data-valor="$599,879">VIVO Y18 8+256GB
                                            </option>
                                            <option value="VIVO Y38 8+256GB" data-valor="$849,879">VIVO Y38 8+256GB
                                            </option>
                                            <option value="XIAOMI REDMI 13 8+256GB" data-valor="$599,889">XIAOMI REDMI
                                                13 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 4G 8+256GB" data-valor="$1,049,889">
                                                XIAOMI REDMI NOTE 14 4G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 5G 8+256GB" data-valor="$1,049,889">
                                                XIAOMI REDMI NOTE 14 5G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 PRO 4G 8+256GB" data-valor="$1,349,889">
                                                XIAOMI REDMI NOTE 14 PRO 4G 8+256GB</option>

                                            <!-- Nuevas opciones agregadas -->
                                            <option value="CATERPILLAR S31" data-valor="$719,950">CATERPILLAR S31
                                            </option>
                                            <option value="HONOR 200 5G 12+256GB" data-valor="$2,399,935">HONOR 200 5G
                                                12+256GB</option>
                                            <option value="HONOR 50 LITE 128GB" data-valor="$835,935">HONOR 50 LITE
                                                128GB</option>
                                            <option value="HONOR 90 5G 256GB" data-valor="$2,659,934">HONOR 90 5G 256GB
                                            </option>
                                            <option value="HONOR 90 LITE 5G 256GB" data-valor="$1,799,935">HONOR 90 LITE
                                                5G 256GB</option>
                                            <option value="HONOR MAGIC 7 LITE 5G 8+512GB" data-valor="$2,099,935">HONOR
                                                MAGIC 7 LITE 5G 8+512GB</option>
                                            <option value="HONOR X5B 4+128GB" data-valor="$449,950">HONOR X5B 4+128GB
                                            </option>
                                            <option value="HONOR X6A 4+128GB" data-valor="$399,935">HONOR X6A 4+128GB
                                            </option>
                                            <option value="HONOR X6S 128GB" data-valor="$479,950">HONOR X6S 128GB
                                            </option>
                                            <option value="HONOR X7 128GB" data-valor="$249,950">HONOR X7 128GB</option>
                                            <option value="HONOR X7A 128GB" data-valor="$629,935">HONOR X7A 128GB
                                            </option>
                                            <option value="HONOR X7B 8+256GB" data-valor="$699,935">HONOR X7B 8+256GB
                                            </option>
                                            <option value="HONOR X8 128GB" data-valor="$379,950">HONOR X8 128GB</option>
                                            <option value="HONOR X8A 8+128GB" data-valor="$599,935">HONOR X8A 8+128GB
                                            </option>
                                            <option value="HONOR X8B 5G 8+256GB" data-valor="$899,935">HONOR X8B 5G
                                                8+256GB</option>
                                            <option value="HONOR X8C 8+256GB 4G" data-valor="$1,094,935">HONOR X8C
                                                8+256GB 4G</option>
                                            <option value="HONOR X8C 8+512GB 4G" data-valor="$1,094,935">HONOR X8C
                                                8+512GB 4G</option>
                                            <option value="HONOR X9 128GB" data-valor="$932,935">HONOR X9 128GB</option>

                                            <!-- iPhones adicionales -->
                                            <option value="IPHONE 11 128GB" data-valor="$1,799,929">IPHONE 11 128GB
                                            </option>
                                            <option value="IPHONE 11 256GB" data-valor="$4,019,928">IPHONE 11 256GB
                                            </option>
                                            <option value="IPHONE 11 64GB" data-valor="$999,935">IPHONE 11 64GB</option>
                                            <option value="IPHONE 11 PRO 64GB" data-valor="$4,849,928">IPHONE 11 PRO
                                                64GB</option>
                                            <option value="IPHONE 12 128GB" data-valor="$2,299,928">IPHONE 12 128GB
                                            </option>
                                            <option value="IPHONE 12 256GB" data-valor="$2,699,929">IPHONE 12 256GB
                                            </option>
                                            <option value="IPHONE 12 64GB" data-valor="$1,999,929">IPHONE 12 64GB
                                            </option>
                                            <option value="IPHONE 12 MINI 128GB" data-valor="$1,699,929">IPHONE 12 MINI
                                                128GB</option>
                                            <option value="IPHONE 12 MINI 64GB" data-valor="$1,399,929">IPHONE 12 MINI
                                                64GB</option>
                                            <option value="IPHONE 12 PRO 128GB" data-valor="$2,999,929">IPHONE 12 PRO
                                                128GB</option>
                                            <option value="IPHONE 13 256GB" data-valor="$2,549,928">IPHONE 13 256GB
                                            </option>
                                            <option value="IPHONE 13 512GB" data-valor="$3,099,929">IPHONE 13 512GB
                                            </option>
                                            <option value="IPHONE 13 MINI 128GB" data-valor="$3,699,929">IPHONE 13 MINI
                                                128GB</option>
                                            <option value="IPHONE 13 PRO 128GB" data-valor="$2,599,929">IPHONE 13 PRO
                                                128GB</option>
                                            <option value="IPHONE 13 PRO 1TB" data-valor="$3,899,929">IPHONE 13 PRO 1TB
                                            </option>
                                            <option value="IPHONE 13 PRO MAX 128GB" data-valor="$4,999,929">IPHONE 13
                                                PRO MAX 128GB</option>
                                            <option value="IPHONE 13 PRO MAX 256GB" data-valor="$4,099,928">IPHONE 13
                                                PRO MAX 256GB</option>
                                            <option value="IPHONE 14 128GB" data-valor="$6,399,928">IPHONE 14 128GB
                                            </option>
                                            <option value="IPHONE 14 256GB" data-valor="$3,209,929">IPHONE 14 256GB
                                            </option>
                                            <option value="IPHONE 14 PLUS 128GB" data-valor="$3,409,930">IPHONE 14 PLUS
                                                128GB</option>
                                            <option value="IPHONE 14 PLUS 256GB" data-valor="$3,609,929">IPHONE 14 PLUS
                                                256GB</option>
                                            <option value="IPHONE 14 PRO 128GB" data-valor="$3,809,929">IPHONE 14 PRO
                                                128GB</option>
                                            <option value="IPHONE 14 PRO 512GB" data-valor="$4,099,928">IPHONE 14 PRO
                                                512GB</option>
                                            <option value="IPHONE 14 PRO MAX 128GB" data-valor="$5,999,929">IPHONE 14
                                                PRO MAX 128GB</option>
                                            <option value="IPHONE 15 PLUS 128GB" data-valor="$5,099,929">IPHONE 15 PLUS
                                                128GB</option>
                                            <option value="IPHONE 15 PRO 128GB" data-valor="$3,980,928">IPHONE 15 PRO
                                                128GB</option>
                                            <option value="IPHONE 15 PRO 256GB" data-valor="$5,117,928">IPHONE 15 PRO
                                                256GB</option>
                                            <option value="IPHONE 16 128GB" data-valor="$4,509,929">IPHONE 16 128GB
                                            </option>
                                            <option value="IPHONE 16 256GB" data-valor="$4,999,929">IPHONE 16 256GB
                                            </option>
                                            <option value="IPHONE 16 512GB" data-valor="$5,999,929">IPHONE 16 512GB
                                            </option>
                                            <option value="IPHONE 16 PLUS 128GB" data-valor="$4,539,929">IPHONE 16 PLUS
                                                128GB</option>
                                            <option value="IPHONE 16 PLUS 256GB" data-valor="$5,109,928">IPHONE 16 PLUS
                                                256GB</option>
                                            <option value="IPHONE 16 PLUS 512GB" data-valor="$6,249,929">IPHONE 16 PLUS
                                                512GB</option>
                                            <option value="IPHONE 16 PRO 128GB" data-valor="$5,119,929">IPHONE 16 PRO
                                                128GB</option>
                                            <option value="IPHONE 16 PRO 1TB" data-valor="$5,679,928">IPHONE 16 PRO 1TB
                                            </option>
                                            <option value="IPHONE 16 PRO 256GB" data-valor="$6,819,928">IPHONE 16 PRO
                                                256GB</option>
                                            <option value="IPHONE 16 PRO 512GB" data-valor="$5,689,928">IPHONE 16 PRO
                                                512GB</option>
                                            <option value="IPHONE 16 PRO MAX 1TB" data-valor="$8,519,929">IPHONE 16 PRO
                                                MAX 1TB</option>
                                            <option value="IPHONE 16 PRO MAX 256GB" data-valor="$6,249,929">IPHONE 16
                                                PRO MAX 256GB</option>
                                            <option value="IPHONE 16 PRO MAX 512GB" data-valor="$7,389,929">IPHONE 16
                                                PRO MAX 512GB</option>
                                            <option value="IPHONE 7 32GB" data-valor="$1,649,949">IPHONE 7 32GB</option>
                                            <option value="IPHONE SE 64GB" data-valor="$1,999,928">IPHONE SE 64GB
                                            </option>
                                            <option value="IPHONE XR 64GB" data-valor="$2,799,928">IPHONE XR 64GB
                                            </option>

                                            <!-- Motorola adicionales -->
                                            <option value="MOTO C" data-valor="$229,950">MOTO C</option>
                                            <option value="MOTO E PLUS" data-valor="$299,900">MOTO E PLUS</option>
                                            <option value="MOTO E13 64GB" data-valor="$99,909">MOTO E13 64GB</option>
                                            <option value="MOTO E20 32GB" data-valor="$474,950">MOTO E20 32GB</option>
                                            <option value="MOTO E22I 64GB" data-valor="$599,950">MOTO E22I 64GB</option>
                                            <option value="MOTO E32 64GB" data-valor="$659,909">MOTO E32 64GB</option>
                                            <option value="MOTO E40 64GB" data-valor="$579,950">MOTO E40 64GB</option>
                                            <option value="MOTO E5 PLUS" data-valor="$399,950">MOTO E5 PLUS</option>
                                            <option value="MOTO E6 PLAY" data-valor="$299,950">MOTO E6 PLAY</option>
                                            <option value="MOTO E6 PLUS 64 GB" data-valor="$499,950">MOTO E6 PLUS 64 GB
                                            </option>
                                            <option value="MOTO E7 32 GB LTE" data-valor="$379,950">MOTO E7 32 GB LTE
                                            </option>
                                            <option value="MOTO E7 PLUS" data-valor="$409,950">MOTO E7 PLUS</option>
                                            <option value="MOTO E7i POWER" data-valor="$349,950">MOTO E7i POWER</option>
                                            <option value="MOTO EDGE 20 LITE" data-valor="$932,909">MOTO EDGE 20 LITE
                                            </option>
                                            <option value="MOTO EDGE 30 FUSION 5G 256G" data-valor="$1,303,909">MOTO
                                                EDGE 30 FUSION 5G 256G</option>
                                            <option value="MOTO EDGE 30 NEO 128GB" data-valor="$899,909">MOTO EDGE 30
                                                NEO 128GB</option>
                                            <option value="MOTO EDGE 30 PRO 5G" data-valor="$1,999,909">MOTO EDGE 30 PRO
                                                5G</option>
                                            <option value="MOTO EDGE 30 ULTRA 5G 12+256G" data-valor="$1,303,909">MOTO
                                                EDGE 30 ULTRA 5G 12+256G</option>
                                            <option value="MOTO EDGE 40 5G 256GB" data-valor="$1,499,909">MOTO EDGE 40
                                                5G 256GB</option>
                                            <option value="MOTO EDGE 50 FUSION 5G 12+512GB" data-valor="$1,599,909">MOTO
                                                EDGE 50 FUSION 5G 12+512GB</option>
                                            <option value="MOTO G 4A PLUS" data-valor="$499,900">MOTO G 4A PLUS</option>
                                            <option value="MOTO G04 4+128GB" data-valor="$479,950">MOTO G04 4+128GB
                                            </option>
                                            <option value="MOTO G04S 4+128GB" data-valor="$399,909">MOTO G04S 4+128GB
                                            </option>
                                            <option value="MOTO G14 4+128GB" data-valor="$399,909">MOTO G14 4+128GB
                                            </option>
                                            <option value="MOTO G20 128GB" data-valor="$529,909">MOTO G20 128GB</option>
                                            <option value="MOTO G200 8+128GB" data-valor="$1,303,909">MOTO G200 8+128GB
                                            </option>
                                            <option value="MOTO G22 128GB" data-valor="$774,909">MOTO G22 128GB</option>
                                            <option value="MOTO G23 128GB" data-valor="$399,909">MOTO G23 128GB</option>
                                            <option value="MOTO G24 4+256GB" data-valor="$499,909">MOTO G24 4+256GB
                                            </option>
                                            <option value="MOTO G30 128GB" data-valor="$599,950">MOTO G30 128GB</option>
                                            <option value="MOTO G31 128GB" data-valor="$449,909">MOTO G31 128GB</option>
                                            <option value="MOTO G34 5G 8+256GB" data-valor="$649,909">MOTO G34 5G
                                                8+256GB</option>
                                            <option value="MOTO G41 128GB" data-valor="$773,909">MOTO G41 128GB</option>
                                            <option value="MOTO G5" data-valor="$449,900">MOTO G5</option>
                                            <option value="MOTO G52 128GB" data-valor="$199,909">MOTO G52 128GB</option>
                                            <option value="MOTO G5S" data-valor="$389,900">MOTO G5S</option>
                                            <option value="MOTO G6" data-valor="$449,900">MOTO G6</option>
                                            <option value="MOTO G60 128GB" data-valor="$899,909">MOTO G60 128GB</option>
                                            <option value="MOTO G60S" data-valor="$449,909">MOTO G60S</option>
                                            <option value="MOTO G7" data-valor="$599,950">MOTO G7</option>
                                            <option value="MOTO G8 PLUS" data-valor="$699,909">MOTO G8 PLUS</option>
                                            <option value="MOTO G84 8+256GB" data-valor="$699,909">MOTO G84 8+256GB
                                            </option>
                                            <option value="MOTO G9 PLAY" data-valor="$449,950">MOTO G9 PLAY</option>
                                            <option value="MOTO G9 PLUS" data-valor="$649,909">MOTO G9 PLUS</option>
                                            <option value="MOTO ONE FUSION" data-valor="$549,950">MOTO ONE FUSION
                                            </option>
                                            <option value="MOTO ONE FUSION 128 GB" data-valor="$69,950">MOTO ONE FUSION
                                                128 GB</option>
                                            <option value="MOTO ONE MACRO" data-valor="$479,950">MOTO ONE MACRO</option>
                                            <option value="MOTO RAZR 50 12+512GB" data-valor="$3,799,909">MOTO RAZR 50
                                                12+512GB</option>

                                            <!-- Nokia -->
                                            <option value="NOKIA 1 PLUS" data-valor="$229,909">NOKIA 1 PLUS</option>
                                            <option value="NOKIA 1.3" data-valor="$229,950">NOKIA 1.3</option>
                                            <option value="NOKIA 1.4" data-valor="$549,909">NOKIA 1.4</option>
                                            <option value="NOKIA 2.3" data-valor="$549,949">NOKIA 2.3</option>
                                            <option value="NOKIA 3.1" data-valor="$199,950">NOKIA 3.1</option>
                                            <option value="NOKIA 3.4" data-valor="$319,950">NOKIA 3.4</option>
                                            <option value="NOKIA 5.1" data-valor="$359,950">NOKIA 5.1</option>
                                            <option value="NOKIA 5.3" data-valor="$369,950">NOKIA 5.3</option>
                                            <option value="NOKIA 5.4" data-valor="$499,950">NOKIA 5.4</option>
                                            <option value="NOKIA 6" data-valor="$491,950">NOKIA 6</option>
                                            <option value="NOKIA 6.2" data-valor="$539,950">NOKIA 6.2</option>
                                            <option value="NOKIA C01 PLUS" data-valor="$599,950">NOKIA C01 PLUS</option>
                                            <option value="NOKIA C1 PLUS" data-valor="$669,869">NOKIA C1 PLUS</option>
                                            <option value="NOKIA C3" data-valor="$519,950">NOKIA C3</option>
                                            <option value="NOKIA G10" data-valor="$699,950">NOKIA G10</option>
                                            <option value="NOKIA G20" data-valor="$249,950">NOKIA G20</option>
                                            <option value="NOKIA G21+ 128GB" data-valor="$241,950">NOKIA G21+ 128GB
                                            </option>
                                            <option value="NOKIA G50 5G 128GB" data-valor="$332,950">NOKIA G50 5G 128GB
                                            </option>
                                            <option value="NOKIA XR20" data-valor="$519,950">NOKIA XR20</option>

                                            <!-- OPPO adicionales -->
                                            <option value="OPPO A16 64GB" data-valor="$409,950">OPPO A16 64GB</option>
                                            <option value="OPPO A17" data-valor="$589,950">OPPO A17</option>
                                            <option value="OPPO A38 4+128GB" data-valor="$899,869">OPPO A38 4+128GB
                                            </option>
                                            <option value="OPPO A40 4+256GB" data-valor="$1,303,869">OPPO A40 4+256GB
                                            </option>
                                            <option value="OPPO A5 PRO 5G 8+256GB" data-valor="$599,950">OPPO A5 PRO 5G
                                                8+256GB</option>
                                            <option value="OPPO A54 128GB" data-valor="$399,839">OPPO A54 128GB</option>
                                            <option value="OPPO A57 128GB" data-valor="$679,839">OPPO A57 128GB</option>
                                            <option value="OPPO A58 256+6" data-valor="$1,698,839">OPPO A58 256+6
                                            </option>
                                            <option value="OPPO A58 6+128GB" data-valor="$763,839">OPPO A58 6+128GB
                                            </option>
                                            <option value="OPPO A60 8+256GB" data-valor="$499,839">OPPO A60 8+256GB
                                            </option>
                                            <option value="OPPO A77 128GB" data-valor="$649,839">OPPO A77 128GB</option>
                                            <option value="OPPO A78 256GB" data-valor="$749,839">OPPO A78 256GB</option>
                                            <option value="OPPO A79 5G 8 +256" data-valor="$799,839">OPPO A79 5G 8 +256
                                            </option>
                                            <option value="OPPO RENO 10 256GB" data-valor="$842,839">OPPO RENO 10 256GB
                                            </option>
                                            <option value="OPPO RENO 11 5G" data-valor="$1,034,839">OPPO RENO 11 5G
                                            </option>
                                            <option value="OPPO RENO 11F 5G" data-valor="$799,839">OPPO RENO 11F 5G
                                            </option>
                                            <option value="OPPO RENO 12 5G 12+512GB" data-valor="$1,094,839">OPPO RENO
                                                12 5G 12+512GB</option>
                                            <option value="OPPO RENO 12F 5G 12+256GB" data-valor="$1,599,840">OPPO RENO
                                                12F 5G 12+256GB</option>
                                            <option value="OPPO RENO 13 F 5G 12+512 GB" data-valor="$2,499,839">OPPO
                                                RENO 13 F 5G 12+512 GB</option>
                                            <option value="OPPO RENO 6 LITE" data-valor="$1,599,840">OPPO RENO 6 LITE
                                            </option>
                                            <option value="OPPO RENO 7 128GB" data-valor="$3,499,839">OPPO RENO 7 128GB
                                            </option>
                                            <option value="OPPO RENO 7 256GB" data-valor="$2,499,839">OPPO RENO 7 256GB
                                            </option>

                                            <!-- Samsung adicionales -->
                                            <option value="SAMSUNG A01" data-valor="$932,839">SAMSUNG A01</option>
                                            <option value="SAMSUNG A01 CORE" data-valor="$1,439,838">SAMSUNG A01 CORE
                                            </option>
                                            <option value="SAMSUNG A02 32GB" data-valor="$1,034,839">SAMSUNG A02 32GB
                                            </option>
                                            <option value="SAMSUNG A02S 64GB" data-valor="$2,499,828">SAMSUNG A02S 64GB
                                            </option>
                                            <option value="SAMSUNG A03 32GB" data-valor="$1,034,950">SAMSUNG A03 32GB
                                            </option>
                                            <option value="SAMSUNG A03 64GB" data-valor="$1,094,949">SAMSUNG A03 64GB
                                            </option>
                                            <option value="SAMSUNG A03 CORE" data-valor="$1,829,950">SAMSUNG A03 CORE
                                            </option>
                                            <option value="SAMSUNG A03S" data-valor="$1,929,949">SAMSUNG A03S</option>
                                            <option value="SAMSUNG A10" data-valor="$1,439,858">SAMSUNG A10</option>
                                            <option value="SAMSUNG A11" data-valor="$999,859">SAMSUNG A11</option>
                                            <option value="SAMSUNG A12 128GB" data-valor="$669,859">SAMSUNG A12 128GB
                                            </option>
                                            <option value="SAMSUNG A12 64GB" data-valor="$429,950">SAMSUNG A12 64GB
                                            </option>
                                            <option value="SAMSUNG A13 128GB" data-valor="$749,859">SAMSUNG A13 128GB
                                            </option>
                                            <option value="SAMSUNG A13 64GB" data-valor="$249,859">SAMSUNG A13 64GB
                                            </option>
                                            <option value="SAMSUNG A20" data-valor="$839,859">SAMSUNG A20</option>
                                            <option value="SAMSUNG A20S" data-valor="$399,859">SAMSUNG A20S</option>
                                            <option value="SAMSUNG A21S" data-valor="$672,950">SAMSUNG A21S</option>
                                            <option value="SAMSUNG A21S 128GB" data-valor="$369,950">SAMSUNG A21S 128GB
                                            </option>
                                            <option value="SAMSUNG A22 128GB" data-valor="$299,950">SAMSUNG A22 128GB
                                            </option>
                                            <option value="SAMSUNG A22 5G 128GB" data-valor="$399,950">SAMSUNG A22 5G
                                                128GB</option>
                                            <option value="SAMSUNG A23 128GB" data-valor="$499,950">SAMSUNG A23 128GB
                                            </option>
                                            <option value="SAMSUNG A24 128GB" data-valor="$220,950">SAMSUNG A24 128GB
                                            </option>
                                            <option value="SAMSUNG A26 8+256GB 5G" data-valor="$309,939">SAMSUNG A26
                                                8+256GB 5G</option>
                                            <option value="SAMSUNG A30" data-valor="$389,939">SAMSUNG A30</option>
                                            <option value="SAMSUNG A30S" data-valor="$579,939">SAMSUNG A30S</option>
                                            <option value="SAMSUNG A31 128 GB" data-valor="$379,950">SAMSUNG A31 128 GB
                                            </option>
                                            <option value="SAMSUNG A32" data-valor="$499,950">SAMSUNG A32</option>
                                            <option value="SAMSUNG A33 5G 128GB" data-valor="$649,939">SAMSUNG A33 5G
                                                128GB</option>
                                            <option value="SAMSUNG A34 5G 128GB" data-valor="$549,950">SAMSUNG A34 5G
                                                128GB</option>
                                            <option value="SAMSUNG A35 5G 8+256GB" data-valor="$749,939">SAMSUNG A35 5G
                                                8+256GB</option>
                                            <option value="SAMSUNG A36 5G 8+256GB" data-valor="$649,939">SAMSUNG A36 5G
                                                8+256GB</option>
                                            <option value="SAMSUNG A5 2017" data-valor="$419,950">SAMSUNG A5 2017
                                            </option>
                                            <option value="SAMSUNG A50" data-valor="$399,950">SAMSUNG A50</option>
                                            <option value="SAMSUNG A51" data-valor="$649,939">SAMSUNG A51</option>
                                            <option value="SAMSUNG A52" data-valor="$699,939">SAMSUNG A52</option>
                                            <option value="SAMSUNG A53 5G 128GB" data-valor="$849,939">SAMSUNG A53 5G
                                                128GB</option>
                                            <option value="SAMSUNG A54 5G 128GB" data-valor="$899,939">SAMSUNG A54 5G
                                                128GB</option>
                                            <option value="SAMSUNG A55 5G 8+256GB" data-valor="$1,999,939">SAMSUNG A55
                                                5G 8+256GB</option>
                                            <option value="SAMSUNG A56 5G 8+256GB" data-valor="$999,939">SAMSUNG A56 5G
                                                8+256GB</option>
                                            <option value="SAMSUNG A71" data-valor="$1,094,939">SAMSUNG A71</option>
                                            <option value="SAMSUNG A72" data-valor="$499,950">SAMSUNG A72</option>
                                            <option value="SAMSUNG GALAXY A04 64GB" data-valor="$549,950">SAMSUNG GALAXY
                                                A04 64GB</option>
                                            <option value="SAMSUNG GALAXY A04E 32GB" data-valor="$797,939">SAMSUNG
                                                GALAXY A04E 32GB</option>
                                            <option value="SAMSUNG GALAXY A04S 128GB" data-valor="$919,939">SAMSUNG
                                                GALAXY A04S 128GB</option>
                                            <option value="SAMSUNG GALAXY A05 4+128GB" data-valor="$1,499,939">SAMSUNG
                                                GALAXY A05 4+128GB</option>
                                            <option value="SAMSUNG GALAXY A05 4+64GB" data-valor="$499,939">SAMSUNG
                                                GALAXY A05 4+64GB</option>
                                            <option value="SAMSUNG GALAXY A05S 4+128GB" data-valor="$1,094,939">SAMSUNG
                                                GALAXY A05S 4+128GB</option>
                                            <option value="SAMSUNG GALAXY A06 128GB" data-valor="$1,549,939">SAMSUNG
                                                GALAXY A06 128GB</option>
                                            <option value="SAMSUNG GALAXY A14 128GB" data-valor="$1,699,939">SAMSUNG
                                                GALAXY A14 128GB</option>
                                            <option value="SAMSUNG GALAXY A15 8+256GB" data-valor="$718,900">SAMSUNG
                                                GALAXY A15 8+256GB</option>
                                            <option value="SAMSUNG GALAXY A16 5G 8+256GB" data-valor="$984,939">SAMSUNG
                                                GALAXY A16 5G 8+256GB</option>
                                            <option value="SAMSUNG GALAXY A25 6+128GB 5G" data-valor="$1,303,939">
                                                SAMSUNG GALAXY A25 6+128GB 5G</option>
                                            <option value="SAMSUNG GALAXY A25 8+256GB 5G" data-valor="$1,399,939">
                                                SAMSUNG GALAXY A25 8+256GB 5G</option>
                                            <option value="SAMSUNG GALAXY S23 256GB" data-valor="$1,799,939">SAMSUNG
                                                GALAXY S23 256GB</option>
                                            <option value="SAMSUNG GALAXY S23 FE 256GB" data-valor="$2,399,938">SAMSUNG
                                                GALAXY S23 FE 256GB</option>
                                            <option value="SAMSUNG GALAXY S23 ULTRA 256GB" data-valor="$1,799,939">
                                                SAMSUNG GALAXY S23 ULTRA 256GB</option>
                                            <option value="SAMSUNG GALAXY S23+ 512GB" data-valor="$2,199,939">SAMSUNG
                                                GALAXY S23+ 512GB</option>
                                            <option value="SAMSUNG GALAXY S24 8+128GB 5G" data-valor="$2,199,939">
                                                SAMSUNG GALAXY S24 8+128GB 5G</option>
                                            <option value="SAMSUNG GALAXY S24 8+256GB 5G" data-valor="$1,529,939">
                                                SAMSUNG GALAXY S24 8+256GB 5G</option>
                                            <option value="SAMSUNG GALAXY S24 FE 5G 8+256GB" data-valor="$1,499,938">
                                                SAMSUNG GALAXY S24 FE 5G 8+256GB</option>
                                            <option value="SAMSUNG GALAXY S24 ULTRA 12+256GB 5G" data-valor="$249,950">
                                                SAMSUNG GALAXY S24 ULTRA 12+256GB 5G</option>
                                            <option value="SAMSUNG GALAXY S24 ULTRA 12+512GB 5G" data-valor="$329,939">
                                                SAMSUNG GALAXY S24 ULTRA 12+512GB 5G</option>
                                            <option value="SAMSUNG GALAXY S24+ 12+256GB 5G" data-valor="$94,939">SAMSUNG
                                                GALAXY S24+ 12+256GB 5G</option>
                                            <option value="SAMSUNG GALAXY S25+ 5G 256GB" data-valor="$599,939">SAMSUNG
                                                GALAXY S25+ 5G 256GB</option>
                                            <option value="SAMSUNG GALAXY Z FLIP5 256GB" data-valor="$449,939">SAMSUNG
                                                GALAXY Z FLIP5 256GB</option>
                                            <option value="SAMSUNG GALAXY Z FLIP5 512GB" data-valor="$679,939">SAMSUNG
                                                GALAXY Z FLIP5 512GB</option>
                                            <option value="SAMSUNG GALAXY Z FLIP6 256GB" data-valor="$449,939">SAMSUNG
                                                GALAXY Z FLIP6 256GB</option>
                                            <option value="SAMSUNG GALAXY Z FOLD5 256GB" data-valor="$559,939">SAMSUNG
                                                GALAXY Z FOLD5 256GB</option>
                                            <option value="SAMSUNG GALAXY Z FOLD5 512GB" data-valor="$459,939">SAMSUNG
                                                GALAXY Z FOLD5 512GB</option>
                                            <option value="SAMSUNG J1 ACE DS" data-valor="$759,939">SAMSUNG J1 ACE DS
                                            </option>
                                            <option value="SAMSUNG J2 PRIME" data-valor="$749,939">SAMSUNG J2 PRIME
                                            </option>
                                            <option value="SAMSUNG J5 PRIME" data-valor="$819,939">SAMSUNG J5 PRIME
                                            </option>
                                            <option value="SAMSUNG J7 PRIME 32" data-valor="$909,939">SAMSUNG J7 PRIME
                                                32</option>
                                            <option value="SAMSUNG S20 FE" data-valor="$869,939">SAMSUNG S20 FE</option>
                                            <option value="SAMSUNG S20 FE 5G 128GB" data-valor="$4,429,938">SAMSUNG S20
                                                FE 5G 128GB</option>
                                            <option value="SAMSUNG S21 256GB" data-valor="$2,899,940">SAMSUNG S21 256GB
                                            </option>
                                            <option value="SAMSUNG S21 FE 256GB" data-valor="$6,999,939">SAMSUNG S21 FE
                                                256GB</option>
                                            <option value="SAMSUNG S22 128GB" data-valor="$6,199,939">SAMSUNG S22 128GB
                                            </option>
                                            <option value="SAMSUNG S22 256GB" data-valor="$4,199,938">SAMSUNG S22 256GB
                                            </option>
                                            <option value="SAMSUNG S22 ULTRA 256GB" data-valor="$4,009,939">SAMSUNG S22
                                                ULTRA 256GB</option>
                                            <option value="SAMSUNG S22+ 256GB" data-valor="$2,599,939">SAMSUNG S22+
                                                256GB</option>
                                            <option value="SAMSUNG Z FLIP 4 256GB" data-valor="$5,299,939">SAMSUNG Z
                                                FLIP 4 256GB</option>
                                            <option value="SAMSUNG Z FOLD 4 256GB" data-valor="$6,769,939">SAMSUNG Z
                                                FOLD 4 256GB</option>

                                            <!-- VIVO adicionales -->
                                            <option value="VIVO V21" data-valor="$4,999,939">VIVO V21</option>
                                            <option value="VIVO V25 5G 128GB" data-valor="$4,899,939">VIVO V25 5G 128GB
                                            </option>
                                            <option value="VIVO V25 PRO 5G 256GB" data-valor="$6,999,939">VIVO V25 PRO
                                                5G 256GB</option>
                                            <option value="VIVO V25E 8+256GB" data-valor="$5,549,939">VIVO V25E 8+256GB
                                            </option>
                                            <option value="VIVO V30 5G 12+512GB" data-valor="$2,998,939">VIVO V30 5G
                                                12+512GB</option>
                                            <option value="VIVO V30 LITE 5G 12+256GB" data-valor="$5,959,939">VIVO V30
                                                LITE 5G 12+256GB</option>
                                            <option value="VIVO V40 5G 12+512GB" data-valor="$5,999,940">VIVO V40 5G
                                                12+512GB</option>
                                            <option value="VIVO V40SE 5G 8+256GB" data-valor="$8,119,939">VIVO V40SE 5G
                                                8+256GB</option>
                                            <option value="VIVO V50 12+512GB 5G" data-valor="$9,919,939">VIVO V50
                                                12+512GB 5G</option>
                                            <option value="VIVO Y01 32GB" data-valor="$99,900">VIVO Y01 32GB</option>
                                            <option value="VIVO Y03 4+128GB" data-valor="$199,900">VIVO Y03 4+128GB
                                            </option>
                                            <option value="VIVO Y04 4+128GB" data-valor="$399,900">VIVO Y04 4+128GB
                                            </option>
                                            <option value="VIVO Y11S" data-valor="$529,900">VIVO Y11S</option>
                                            <option value="VIVO Y15S 64GB" data-valor="$2,254,938">VIVO Y15S 64GB
                                            </option>
                                            <option value="VIVO Y16 128GB" data-valor="$2,499,939">VIVO Y16 128GB
                                            </option>
                                            <option value="VIVO Y17S 4+128G" data-valor="$3,599,938">VIVO Y17S 4+128G
                                            </option>
                                            <option value="VIVO Y19S 6+256GB" data-valor="$2,399,938">VIVO Y19S 6+256GB
                                            </option>
                                            <option value="VIVO Y20 128GB" data-valor="$3,746,939">VIVO Y20 128GB
                                            </option>
                                            <option value="VIVO Y20S 128GB" data-valor="$5,499,938">VIVO Y20S 128GB
                                            </option>
                                            <option value="VIVO Y21S 128GB" data-valor="$4,999,939">VIVO Y21S 128GB
                                            </option>
                                            <option value="VIVO Y22S 4-128GB" data-valor="$679,939">VIVO Y22S 4-128GB
                                            </option>
                                            <option value="VIVO Y22S 6-128GB" data-valor="$699,939">VIVO Y22S 6-128GB
                                            </option>
                                            <option value="VIVO Y27 6+128G" data-valor="$880,527">VIVO Y27 6+128G
                                            </option>
                                            <option value="VIVO Y27S 8+256GB" data-valor="$5,299,939">VIVO Y27S 8+256GB
                                            </option>
                                            <option value="VIVO Y33S" data-valor="$8,399,939">VIVO Y33S</option>
                                            <option value="VIVO Y35 128GB" data-valor="$1,094,900">VIVO Y35 128GB
                                            </option>
                                            <option value="VIVO Y36 8+128GB" data-valor="$799,900">VIVO Y36 8+128GB
                                            </option>
                                            <option value="VIVO Y39 8+256GB 5G" data-valor="$691,900">VIVO Y39 8+256GB
                                                5G</option>
                                            <option value="VIVO Y51" data-valor="$932,879">VIVO Y51</option>
                                            <option value="VIVO Y53S" data-valor="$2,499,879">VIVO Y53S</option>

                                            <!-- XIAOMI adicionales -->
                                            <option value="XIAOMI 11 LITE 5G NE 128GB" data-valor="$1,094,879">XIAOMI 11
                                                LITE 5G NE 128GB</option>
                                            <option value="XIAOMI 11T" data-valor="$2,199,879">XIAOMI 11T</option>
                                            <option value="XIAOMI 11T PRO 256GB" data-valor="$1,899,879">XIAOMI 11T PRO
                                                256GB</option>
                                            <option value="XIAOMI 12 5G 256GB" data-valor="$1,999,879">XIAOMI 12 5G
                                                256GB</option>
                                            <option value="XIAOMI 12 LITE 5G 128GB" data-valor="$1,549,879">XIAOMI 12
                                                LITE 5G 128GB</option>
                                            <option value="XIAOMI 12T PRO 5G 256GB" data-valor="$3,199,879">XIAOMI 12T
                                                PRO 5G 256GB</option>
                                            <option value="XIAOMI 13T 5G 256GB" data-valor="$269,950">XIAOMI 13T 5G
                                                256GB</option>
                                            <option value="XIAOMI 14T 12+512GB" data-valor="$449,879">XIAOMI 14T
                                                12+512GB</option>
                                            <option value="XIAOMI 14T PRO 12+512GB" data-valor="$529,879">XIAOMI 14T PRO
                                                12+512GB</option>
                                            <option value="XIAOMI 15 5G 12+512GB" data-valor="$299,950">XIAOMI 15 5G
                                                12+512GB</option>
                                            <option value="XIAOMI MI 11 LITE 5G" data-valor="$399,950">XIAOMI MI 11 LITE
                                                5G</option>
                                            <option value="XIAOMI NOTE 10 5G" data-valor="$799,879">XIAOMI NOTE 10 5G
                                            </option>
                                            <option value="XIAOMI NOTE 10 PRO" data-valor="$699,879">XIAOMI NOTE 10 PRO
                                            </option>
                                            <option value="XIAOMI NOTE 10S" data-valor="$709,879">XIAOMI NOTE 10S
                                            </option>
                                            <option value="XIAOMI NOTE 11 128GB" data-valor="$729,879">XIAOMI NOTE 11
                                                128GB</option>
                                            <option value="XIAOMI NOTE 11 PRO 5G 128GB" data-valor="$529,950">XIAOMI
                                                NOTE 11 PRO 5G 128GB</option>
                                            <option value="XIAOMI NOTE 11S 128GB" data-valor="$499,950">XIAOMI NOTE 11S
                                                128GB</option>
                                            <option value="XIAOMI NOTE 12 128GB" data-valor="$849,879">XIAOMI NOTE 12
                                                128GB</option>
                                            <option value="XIAOMI NOTE 12 PRO+ 256GB 5G" data-valor="$749,879">XIAOMI
                                                NOTE 12 PRO+ 256GB 5G</option>
                                            <option value="XIAOMI NOTE 12S 8+256GB" data-valor="$299,879">XIAOMI NOTE
                                                12S 8+256GB</option>
                                            <option value="XIAOMI REDMI 10 128GB" data-valor="$699,879">XIAOMI REDMI 10
                                                128GB</option>
                                            <option value="XIAOMI REDMI 10 2022 128GB" data-valor="$929,879">XIAOMI
                                                REDMI 10 2022 128GB</option>
                                            <option value="XIAOMI REDMI 10 64GB" data-valor="$899,879">XIAOMI REDMI 10
                                                64GB</option>
                                            <option value="XIAOMI REDMI 10A 32GB" data-valor="$1,799,879">XIAOMI REDMI
                                                10A 32GB</option>
                                            <option value="XIAOMI REDMI 10C 128GB" data-valor="$499,879">XIAOMI REDMI
                                                10C 128GB</option>
                                            <option value="XIAOMI REDMI 10C 64GB" data-valor="$899,879">XIAOMI REDMI 10C
                                                64GB</option>
                                            <option value="XIAOMI REDMI 10C LTE 64GB" data-valor="$1,094,879">XIAOMI
                                                REDMI 10C LTE 64GB</option>
                                            <option value="XIAOMI REDMI 12 256GB" data-valor="$629,879">XIAOMI REDMI 12
                                                256GB</option>
                                            <option value="XIAOMI REDMI 12C 4+128GB" data-valor="$899,879">XIAOMI REDMI
                                                12C 4+128GB</option>
                                            <option value="XIAOMI REDMI 13C 4+128GB" data-valor="$649,889">XIAOMI REDMI
                                                13C 4+128GB</option>
                                            <option value="XIAOMI REDMI 13C 8+256GB" data-valor="$1,303,889">XIAOMI
                                                REDMI 13C 8+256GB</option>
                                            <option value="XIAOMI REDMI 14C 4+128GB" data-valor="$2,409,888">XIAOMI
                                                REDMI 14C 4+128GB</option>
                                            <option value="XIAOMI REDMI 14C 4+256GB" data-valor="$3,579,889">XIAOMI
                                                REDMI 14C 4+256GB</option>
                                            <option value="XIAOMI REDMI 9" data-valor="$2,084,888">XIAOMI REDMI 9
                                            </option>
                                            <option value="XIAOMI REDMI 9A" data-valor="$2,939,888">XIAOMI REDMI 9A
                                            </option>
                                            <option value="XIAOMI REDMI 9C" data-valor="$2,689,888">XIAOMI REDMI 9C
                                            </option>
                                            <option value="XIAOMI REDMI 9T" data-valor="$2,599,889">XIAOMI REDMI 9T
                                            </option>
                                            <option value="XIAOMI REDMI A2 64GB" data-valor="$2,999,889">XIAOMI REDMI A2
                                                64GB</option>
                                            <option value="XIAOMI REDMI NOTE 13 8+256GB" data-valor="$4,999,889">XIAOMI
                                                REDMI NOTE 13 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 13 PRO 5G 8+256GB" data-valor="$369,889">
                                                XIAOMI REDMI NOTE 13 PRO 5G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 13 PRO 8+256GB" data-valor="$359,889">
                                                XIAOMI REDMI NOTE 13 PRO 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 PRO 5G 8+256GB" data-valor="$1,499,889">
                                                XIAOMI REDMI NOTE 14 PRO 5G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 14 PRO+ 5G 8+256GB"
                                                data-valor="$1,799,889">XIAOMI REDMI NOTE 14 PRO+ 5G 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 5G 13 8+256GB" data-valor="$2,099,889">
                                                XIAOMI REDMI NOTE 5G 13 8+256GB</option>
                                            <option value="XIAOMI REDMI NOTE 8" data-valor="$799,889">XIAOMI REDMI NOTE
                                                8</option>
                                            <option value="XIAOMI REDMI NOTE 8 128GB" data-valor="$499,950">XIAOMI REDMI
                                                NOTE 8 128GB</option>
                                            <option value="XIAOMI REDMI NOTE 9" data-valor="$569,950">XIAOMI REDMI NOTE
                                                9</option>

                                            <!-- Realme -->
                                            <option value="REALME 10 8+256GB" data-valor="$549,950">REALME 10 8+256GB
                                            </option>
                                            <option value="REALME 12 5G 8+256GB" data-valor="$649,889">REALME 12 5G
                                                8+256GB</option>
                                            <option value="REALME 7i 128GB" data-valor="$649,889">REALME 7i 128GB
                                            </option>
                                            <option value="REALME C21Y" data-valor="$649,889">REALME C21Y</option>
                                            <option value="REALME C35 128GB" data-valor="$499,889">REALME C35 128GB
                                            </option>
                                            <option value="REALME C53 128GB" data-valor="$499,889">REALME C53 128GB
                                            </option>
                                            <option value="REALME C55 256GB" data-valor="$499,889">REALME C55 256GB
                                            </option>
                                            <option value="REALME C67 8+256GB" data-valor="$499,889">REALME C67 8+256GB
                                            </option>

                                            <!-- Tecno -->
                                            <option value="TECNO CAMON 30S PRO 8+256GB CSG" data-valor="$499,889">TECNO
                                                CAMON 30S PRO 8+256GB CSG</option>
                                            <option value="TECNO SPARK 30 5G 8+256GB CSG" data-valor="$499,889">TECNO
                                                SPARK 30 5G 8+256GB CSG</option>

                                            <!-- Otros -->
                                            <option value="RUGGEAR RG170" data-valor="$191,950">RUGGEAR RG170</option>
                                            <option value="TELO TE580" data-valor="$199,889">TELO TE580</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="valorEquipo"><i class="fas fa-dollar-sign"></i> VALOR DE
                                            EQUIPO</label>
                                        <input type="text" class="form-control" name="valorEquipo"
                                            id="valorEquipo" readonly>
                                    </div>
                                </div>

                                <div id="reagendamientoInputs" class="col-md-12" style="display: none;">
                                    <div class="form-group mt-3">
                                        <label for="direccionReagendamiento">Dirección de Reagendamiento</label>
                                        <input type="text" class="form-control" name="direccionReagendamiento"
                                            id="direccionReagendamiento" placeholder="Ingrese la dirección">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="tkReagendamiento"># TK del Reagendamiento</label>
                                        <input type="text" class="form-control" name="tkReagendamiento"
                                            id="tkReagendamiento" placeholder="Ingrese el número de TK">
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
                                        <select name="simcard" class="custom-select col-md-12">
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
                                        <input type="file" name="reagendamientoImg" id="foto"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div> <!-- FIN contenidoIN -->

                        <input type="hidden" id="cedulaAgente" name="cedulaAgente" value="{{ $user_id }}">
                        <input type="hidden" id="agente" name="agente" value="{{ $user_nombre }}">
                        <input type="hidden" name="tipo" value="linea_rescate">

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
            const tipoLlamadaSelect = document.getElementById('tipoLlamadaRescate');
            const contenidoIN = document.getElementById('contenidoIN');
            const contenidoOUT = document.getElementById('contenidoOUT');

            if (tipoLlamadaSelect) {
                tipoLlamadaSelect.addEventListener('change', function() {
                    // Ocultar ambos contenidos primero
                    if (contenidoIN) contenidoIN.style.display = 'none';
                    if (contenidoOUT) contenidoOUT.style.display = 'none';

                    // Mostrar el contenido correspondiente
                    if (this.value === 'IN') {
                        contenidoIN.style.display = 'block';
                    } else if (this.value === 'OUT') {
                        contenidoOUT.style.display = 'block';
                    }
                });
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const tipoLlamadaSelect = document.getElementById('tipoLlamadaRescate');
            const contenidoIN = document.getElementById('contenidoIN');
            const contenidoOUT = document.getElementById('contenidoOUT');

            if (tipoLlamadaSelect) {
                tipoLlamadaSelect.addEventListener('change', function() {
                    // Ocultar ambos contenidos primero
                    if (contenidoIN) contenidoIN.style.display = 'none';
                    if (contenidoOUT) contenidoOUT.style.display = 'none';

                    // Mostrar el contenido correspondiente
                    if (this.value === 'IN') {
                        contenidoIN.style.display = 'block';
                        toggleRequiredFields('IN');
                    } else if (this.value === 'OUT') {
                        contenidoOUT.style.display = 'block';
                        toggleRequiredFields('OUT');
                        // Inicializar departamentos para OUT
                        setTimeout(() => {
                            inicializarDepartamentosOUT();
                        }, 100);
                    }
                });
            }

            // ============================
            // FUNCIONALIDAD DE BÚSQUEDA PARA OUT
            // ============================
            const btnBuscarRegistro = document.getElementById('btnBuscarRegistro');
            const buscarLineaTitular = document.getElementById('buscarLineaTitular');
            const mensajeBusqueda = document.getElementById('mensajeBusqueda');

            if (btnBuscarRegistro) {
                btnBuscarRegistro.addEventListener('click', function() {
                    const lineaTitular = buscarLineaTitular.value.trim();

                    if (!lineaTitular) {
                        mensajeBusqueda.innerHTML =
                            '<div class="alert alert-warning">Por favor ingrese una línea titular</div>';
                        return;
                    }

                    // Mostrar mensaje de carga
                    mensajeBusqueda.innerHTML =
                        '<div class="alert alert-info"><i class="fas fa-spinner fa-spin"></i> Buscando...</div>';

                    fetch(`/buscar-ultimo-registro/${lineaTitular}`)
                        .then(response => {
                            console.log('Response status:', response.status);
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            if (data.success) {
                                cargarDatosEnFormulario(data.registro);
                                mensajeBusqueda.innerHTML =
                                    '<div class="alert alert-success">Registro encontrado y cargado correctamente</div>';
                            } else {
                                mensajeBusqueda.innerHTML = '<div class="alert alert-danger">' + (data
                                        .message || 'No se encontró registro para esta línea') +
                                    '</div>';
                            }
                        })
                        .catch(error => {
                            console.error('Error en la búsqueda:', error);
                            mensajeBusqueda.innerHTML =
                                '<div class="alert alert-danger">Error al buscar el registro. Verifique la conexión.</div>';
                        });
                });
            }

            // ============================
            // FUNCIÓN PARA CARGAR DATOS EN FORMULARIO OUT
            // ============================
            function cargarDatosEnFormulario(registro) {
                console.log('Cargando datos:', registro);

                // MAPEO CORRECTO: ID del elemento → campo en base de datos
                const mapeoCompleto = {
                    // Campos básicos
                    'nombreMotorizadoOUT': 'nombreMotorizado',
                    'cedulaMotorizadoOUT': 'cedulaMotorizado',
                    'lineaTitularOUT': 'lineaTitular',
                    'nOrdenOUT': 'nOrden',
                    'nGuiaOUT': 'nGuia',
                    'direccionRegistradaOUT': 'direccionRegistrada',
                    'lineaContactoMotorizadoOUT': 'lineaContactoMorotizado',
                    'horaAtencionOUT': 'HoraAtencionMotorizado',
                    'observacionOUT': 'Observacion',

                    // Campos de documentos
                    'documentoTitularOUT': 'documentoTitular',
                    'nombreTitularOUT': 'nombreTitular',
                    'lineaCelularTitularOUT': 'lineaCelularTitular',
                    'documentoTerceroOUT': 'documentoTercero',
                    'nombreTerceroOUT': 'nombreTercero',
                    'lineaCelularTerceroOUT': 'lineaCelularTercero',
                    'otrosAliadosOUT': 'otrosAliados',
                    'direccionReagendamientoOUT': 'direccionReagendamiento',
                    'tkReagendamientoOUT': 'tkReagendamiento',

                    // Selects
                    'transportadoraOUT': 'transportadora',
                    'aliadoOUT': 'aliado',
                    'tipo_novedad_out': 'tipoNovedad',
                    'motivoFuerzaMayorOUT': 'motivoFuerzaMayor',
                    'tipoTerceroOUT': 'tipoTercero',
                    'estadoMotorizadoOUT': 'estadoMotorizado',
                    'tipo_general_out': 'tipificacion',
                    'tipo_especifico_out': 'SubTipificacion',
                    'modeloEquipoOUT': 'modeloEquipo',
                    'valorEquipoOUT': 'valorEquipo',
                    'simcardOUT': 'simcard'
                };


                // Llenar todos los campos del mapeo
                Object.keys(mapeoCompleto).forEach(idElemento => {
                    const elemento = document.getElementById(idElemento);
                    const campoBD = mapeoCompleto[idElemento];
                    const valor = registro[campoBD];

                    if (elemento) {
                        elemento.value = valor || '';
                        console.log(`${idElemento} ← ${campoBD}:`, valor || 'VACÍO');

                        // Disparar evento change para elementos select
                        if (elemento.tagName === 'SELECT' && valor) {
                            const evento = new Event('change');
                            elemento.dispatchEvent(evento);
                        }
                    } else {
                        console.warn(`Elemento no encontrado: ${idElemento}`);
                    }
                });

                // Manejo específico de departamento y ciudad
                const departamentoSelect = document.getElementById('departamentoOUT');
                const ciudadSelect = document.getElementById('ciudadOUT');

                if (departamentoSelect) {
                    mostrarLugaresOUT(departamentosOUT, departamentoSelect);

                    if (registro.departamento) {
                        departamentoSelect.value = registro.departamento;
                        console.log('Departamento cargado:', registro.departamento);

                        departamentoSelect.dispatchEvent(new Event('change'));

                        setTimeout(() => {
                            if (ciudadSelect && registro.ciudad) {
                                ciudadSelect.value = registro.ciudad;
                                console.log('Ciudad cargada:', registro.ciudad);
                            }
                        }, 200);
                    }
                }

                // Manejar SubTipificacion con delay
                if (registro.tipificacion && registro.SubTipificacion) {
                    setTimeout(() => {
                        const subTipSelect = document.getElementById('tipo_especifico_out');
                        if (subTipSelect) {
                            subTipSelect.value = registro.SubTipificacion;
                            console.log('SubTipificacion cargada:', registro.SubTipificacion);
                        }
                    }, 300);
                }

                // Mostrar campos condicionales
                if (registro.aliado === 'OTROS') {
                    const otrosDiv = document.getElementById('otros_aliados_div_out');
                    if (otrosDiv) otrosDiv.style.display = 'block';
                }

                if (registro.tipoNovedad === 'FUERZA MAYOR') {
                    const fuerzaDiv = document.getElementById('motivo_fuerza_mayor_out');
                    if (fuerzaDiv) fuerzaDiv.style.display = 'block';
                } else if (registro.tipoNovedad === 'DOCUMENTO_TITULAR') {
                    const titularDiv = document.getElementById('campos_titular_out');
                    if (titularDiv) titularDiv.style.display = 'block';
                } else if (registro.tipoNovedad === 'DOCUMENTO_TERCERO') {
                    const terceroDiv = document.getElementById('campos_tercero_out');
                    if (terceroDiv) terceroDiv.style.display = 'block';
                }
            }

            // ============================
            // DEPARTAMENTOS Y CIUDADES PARA OUT
            // ============================

            // Elementos para OUT
            let $departamentoOUT = document.getElementById('departamentoOUT');
            let $ciudadOUT = document.getElementById('ciudadOUT');

            // Arrays de departamentos y ciudades
            let departamentosOUT = ['Amazonas', 'Antioquia', 'Arauca', 'Atlántico', 'Bolívar', 'Boyacá', 'Caldas',
                'Caquetá', 'Casanare', 'Cauca', 'Cesar', 'Chocó', 'Córdoba', 'Cundinamarca', 'Guainía',
                'Guaviare', 'Huila', 'La Guajira', 'Magdalena', 'Meta', 'Nariño', 'Norte de Santander',
                'Putumayo', 'Quindío', 'Risaralda', 'San Andrés y Providencia', 'Santander', 'Sucre', 'Tolima',
                'Valle del Cauca', 'Vaupés', 'Vichada'
            ];

            let ciudadesOUT = ['Leticia', 'La Chorrera', 'La Pedrera', 'La Victoria', 'Mirití Paraná',
                'Puerto Alegría', 'Puerto Arica', 'Puerto Nariño', 'Puerto Santander', 'Tarapacá', 'Medellin',
                'Abejorral', 'Abriaquí', 'Alejandría', 'Amagá', 'Amalfi', 'Andes', 'Angelópolis', 'Angostura',
                'Anorí', 'Anzá', 'Apartadó', 'Arboletes', 'Argelia', 'Armenia', 'Barbosa', 'Bello', 'Belmira',
                'Betania', 'Betulia', 'Briceño', 'Buriticá', 'Cáceres', 'Caicedo', 'Caldas', 'Campamento',
                'Cañasgordas', 'Caracolí', 'Caramanta', 'Carepa', 'Carolina del Príncipe', 'Caucasia',
                'Chigorodó', 'Cisneros', 'Ciudad Bolívar', 'Cocorná', 'Concepción', 'Concordia', 'Copacabana',
                'Dabeiba', 'Donmatías', 'Ebéjico', 'El Bagre', 'El Carmen de Viboral', 'El Peñol', 'El Retiro',
                'El Santuario', 'Entrerríos', 'Envigado', 'Fredonia', 'Frontino', 'Giraldo', 'Girardota',
                'Gómez Plata', 'Granada', 'Guadalupe', 'Guarne', 'Guatapé', 'Heliconia', 'Hispania', 'Itagüí',
                'Ituango', 'Jardín', 'Jericó', 'La Ceja', 'La Estrella', 'La Pintada', 'La Unión', 'Liborina',
                'Maceo', 'Marinilla', 'Montebello', 'Murindó', 'Mutatá', 'Nariño', 'Nechí', 'Necoclí', 'Olaya',
                'Peque', 'Pueblorrico', 'Puerto Berrío', 'Puerto Nare', 'Puerto Triunfo', 'Remedios',
                'Rionegro', 'Sabanalarga', 'Sabaneta', 'Salgar', 'San Andrés de Cuerquia', 'San Carlos',
                'San Francisco', 'San Jerónimo', 'San José de la Montaña', 'San Juan de Urabá', 'San Luis',
                'San Pedro de los Milagros', 'San Pedro de Urabá', 'San Rafael', 'San Roque', 'San Vicente',
                'Santa Bárbara', 'Santa Fe de Antioquia', 'Santa Rosa de Osos', 'Santo Domingo', 'Segovia',
                'Sonsón', 'Sopetrán', 'Támesis', 'Tarazá', 'Tarso', 'Titiribí', 'Toledo', 'Turbo', 'Uramita',
                'Urrao', 'Valdivia', 'Valparaíso', 'Vegachí', 'Venecia', 'Vigía del Fuerte', 'Yalí', 'Yarumal',
                'Yolombó', 'Yondó', 'Zaragoza', 'Arauca', 'Arauquita', 'Cravo Norte', 'Fortul', 'Puerto Rondón',
                'Saravena', 'Tame', 'Barranquilla', 'Baranoa', 'Campo de la Cruz', 'Candelaria', 'Galapa',
                'Juan de Acosta', 'Luruaco', 'Malambo', 'Manatí', 'Palmar de Varela', 'Piojó', 'Polonuevo',
                'Ponedera', 'Puerto Colombia', 'Repelón', 'Sabanagrande', 'Sabanalarga', 'Santa Lucía',
                'Santo Tomás', 'Soledad', 'Suan', 'Tubará', 'Usiacurí', 'Cartagena de Indias', 'Achí',
                'Altos del Rosario', 'Arenal', 'Arjona', 'Arroyohondo', 'Barranco de Loba', 'Calamar',
                'Cantagallo', 'Cicuco', 'Clemencia', 'Córdoba', 'El Carmen de Bolívar', 'El Guamo', 'El Peñón',
                'Hatillo de Loba', 'Magangué', 'Mahates', 'Margarita ', 'María La Baja', 'Montecristo',
                'Morales', 'Norosí', 'Pinillos', 'Regidor', 'Río Viejo', 'San Cristóbal', 'San Estanislao',
                'San Fernando', 'San Jacinto', 'San Jacinto del Cauca', 'San Juan Nepomuceno',
                'San Martín de Loba', 'San Pablo', 'Santa Catalina', 'Santa Cruz de Mompox', 'Santa Rosa',
                'Santa Rosa del Sur', 'Simití', 'Soplaviento', 'Talaigua Nuevo', 'Tiquisio', 'Turbaco',
                'Turbaná', 'Villanueva', 'Zambrano', 'Tunja', 'Almeida', 'Aquitania', 'Arcabuco', 'Belén',
                'Berbeo', 'Betéitiva', 'Boavita', 'Boyacá', 'Briceño', 'Buenavista', 'Busbanzá', 'Caldas',
                'Campohermoso', 'Cerinza', 'Chinavita', 'Chiquinquirá', 'Chíquiza', 'Chiscas', 'Chita',
                'Chitaraque', 'Chivatá', 'Chivor', 'Ciénega', 'Cómbita', 'Coper', 'Corrales', 'Covarachía',
                'Cubará', 'Cucaita', 'Cuítiva', 'Duitama', 'El Cocuy', 'El Espino', 'Firavitoba', 'Floresta',
                'Gachantivá', 'Gámeza', 'Garagoa', 'Guacamayas', 'Guateque', 'Guayatá', 'Güicán', 'Iza',
                'Jenesano', 'Jericó', 'La Capilla', 'La Uvita', 'La Victoria', 'Labranzagrande', 'Macanal',
                'Maripí', 'Miraflores', 'Mongua', 'Monguí', 'Moniquirá', 'Motavita', 'Muzo', 'Nobsa',
                'Nuevo Colón', 'Oicatá', 'Otanche', 'Pachavita', 'Páez', 'Paipa', 'Pajarito', 'Panqueba',
                'Pauna', 'Paya', 'Paz de Río', 'Pesca', 'Pisba', 'Puerto Boyacá', 'Quípama', 'Ramiriquí',
                'Ráquira', 'Rondón', 'Saboyá', 'Sáchica', 'Samacá', 'San Eduardo', 'San José de Pare',
                'San Luis de Gaceno', 'San Mateo', 'San Miguel de Sema', 'San Pablo de Borbur', 'Santa María',
                'Santa Rosa de Viterbo', 'Santa Sofía', 'Santana', 'Sativanorte', 'Sativasur', 'Siachoque',
                'Soatá', 'Socha', 'Socotá', 'Sogamoso', 'Somondoco', 'Sora', 'Soracá', 'Sotaquirá', 'Susacón',
                'Sutamarchán', 'Sutatenza', 'Tasco', 'Tenza', 'Tibaná', 'Tibasosa', 'Tinjacá', 'Tipacoque',
                'Toca', 'Togüí', 'Tópaga', 'Tota', 'Tununguá', 'Turmequé', 'Tuta', 'Tutazá', 'Úmbita',
                'Ventaquemada', 'Villa de Leyva', 'Viracachá', 'Zetaquira', 'Risaralda', 'Aguadas', 'Anserma',
                'Aranzazu', 'Belalcázar', 'Chinchiná', 'Filadelfia', 'La Dorada', 'La Merced', 'Manizales',
                'Manzanares', 'Marmato', 'Marquetalia', 'Marulanda', 'Neira', 'Norcasia', 'Pácora', 'Palestina',
                'Pensilvania', 'Riosucio', 'Salamina', 'Samaná', 'San José', 'Supía', 'Victoria', 'Villamaría',
                'Viterbo'
            ];

            // Función para mostrar lugares en OUT
            function mostrarLugaresOUT(arreglo, lugar) {
                let elementos = '<option value="">Seleccione</option>';
                for (let i = 0; i < arreglo.length; i++) {
                    elementos += '<option value="' + arreglo[i] + '">' + arreglo[i] + '</option>';
                }
                lugar.innerHTML = elementos;
            }

            // Función para recortar array en OUT
            function recortarOUT(array, inicio, fin, lugar) {
                let recortar = array.slice(inicio, fin);
                mostrarLugaresOUT(recortar, lugar);
            }

            // Inicializar departamentos para OUT cuando se carga la página o se selecciona OUT
            function inicializarDepartamentosOUT() {
                if ($departamentoOUT) {
                    mostrarLugaresOUT(departamentosOUT, $departamentoOUT);
                    console.log('Departamentos OUT inicializados');
                }
            }

            // Event listener para cuando cambie el departamento en OUT
            if ($departamentoOUT && $ciudadOUT) {
                $departamentoOUT.addEventListener('change', function() {
                    let valor = $departamentoOUT.value;
                    console.log('Departamento OUT seleccionado:', valor);

                    // Limpiar ciudades
                    $ciudadOUT.innerHTML = '<option value="">Ciudad</option>';

                    switch (valor) {
                        case 'Amazonas':
                            recortarOUT(ciudadesOUT, 0, 10, $ciudadOUT);
                            break;
                        case 'Antioquia':
                            recortarOUT(ciudadesOUT, 10, 135, $ciudadOUT);
                            break;
                        case 'Arauca':
                            recortarOUT(ciudadesOUT, 135, 142, $ciudadOUT);
                            break;
                        case 'Atlántico':
                            recortarOUT(ciudadesOUT, 142, 165, $ciudadOUT);
                            break;
                        case 'Bolívar':
                            recortarOUT(ciudadesOUT, 165, 211, $ciudadOUT);
                            break;
                        case 'Boyacá':
                            recortarOUT(ciudadesOUT, 211, 335, $ciudadOUT);
                            break;
                        case 'Caldas':
                            recortarOUT(ciudadesOUT, 335, 362, $ciudadOUT);
                            break;
                        case 'Caquetá':
                            recortarOUT(ciudadesOUT, 362, 378, $ciudadOUT);
                            break;
                        case 'Casanare':
                            recortarOUT(ciudadesOUT, 378, 397, $ciudadOUT);
                            break;
                        case 'Cauca':
                            recortarOUT(ciudadesOUT, 397, 439, $ciudadOUT);
                            break;
                        case 'Cesar':
                            recortarOUT(ciudadesOUT, 439, 464, $ciudadOUT);
                            break;
                        case 'Chocó':
                            recortarOUT(ciudadesOUT, 464, 494, $ciudadOUT);
                            break;
                        case 'Córdoba':
                            recortarOUT(ciudadesOUT, 494, 524, $ciudadOUT);
                            break;
                        case 'Cundinamarca':
                            recortarOUT(ciudadesOUT, 524, 640, $ciudadOUT);
                            break;
                        case 'Guainía':
                            recortarOUT(ciudadesOUT, 640, 648, $ciudadOUT);
                            break;
                        case 'Guaviare':
                            recortarOUT(ciudadesOUT, 648, 652, $ciudadOUT);
                            break;
                        case 'Huila':
                            recortarOUT(ciudadesOUT, 652, 689, $ciudadOUT);
                            break;
                        case 'La Guajira':
                            recortarOUT(ciudadesOUT, 689, 704, $ciudadOUT);
                            break;
                        case 'Magdalena':
                            recortarOUT(ciudadesOUT, 704, 734, $ciudadOUT);
                            break;
                        case 'Meta':
                            recortarOUT(ciudadesOUT, 734, 763, $ciudadOUT);
                            break;
                        case 'Nariño':
                            recortarOUT(ciudadesOUT, 763, 826, $ciudadOUT);
                            break;
                        case 'Norte de Santander':
                            recortarOUT(ciudadesOUT, 826, 866, $ciudadOUT);
                            break;
                        case 'Putumayo':
                            recortarOUT(ciudadesOUT, 866, 879, $ciudadOUT);
                            break;
                        case 'Quindío':
                            recortarOUT(ciudadesOUT, 879, 891, $ciudadOUT);
                            break;
                        case 'Risaralda':
                            recortarOUT(ciudadesOUT, 891, 905, $ciudadOUT);
                            break;
                        case 'San Andrés y Providencia':
                            recortarOUT(ciudadesOUT, 905, 908, $ciudadOUT);
                            break;
                        case 'Santander':
                            recortarOUT(ciudadesOUT, 908, 995, $ciudadOUT);
                            break;
                        case 'Sucre':
                            recortarOUT(ciudadesOUT, 995, 1021, $ciudadOUT);
                            break;
                        case 'Tolima':
                            recortarOUT(ciudadesOUT, 1021, 1068, $ciudadOUT);
                            break;
                        case 'Valle del Cauca':
                            recortarOUT(ciudadesOUT, 1068, 1110, $ciudadOUT);
                            break;
                        case 'Vaupés':
                            recortarOUT(ciudadesOUT, 1110, 1116, $ciudadOUT);
                            break;
                        case 'Vichada':
                            recortarOUT(ciudadesOUT, 1116, 1120, $ciudadOUT);
                            break;
                    }
                });
            }

            // ============================
            // EVENT LISTENERS PARA CAMPOS CONDICIONALES OUT
            // ============================

            // Otros aliados para OUT
            const aliadoSelectOUT = document.getElementById('aliadoOUT');
            if (aliadoSelectOUT) {
                aliadoSelectOUT.addEventListener('change', function() {
                    const otrosDiv = document.getElementById('otros_aliados_div_out');
                    if (this.value === 'OTROS') {
                        otrosDiv.style.display = 'block';
                    } else {
                        otrosDiv.style.display = 'none';
                    }
                });
            }

            // Tipo de novedad para OUT
            const tipoNovedadOUT = document.getElementById('tipo_novedad_out');
            if (tipoNovedadOUT) {
                tipoNovedadOUT.addEventListener('change', function() {
                    // Ocultar todos primero
                    document.getElementById('motivo_fuerza_mayor_out').style.display = 'none';
                    document.getElementById('campos_titular_out').style.display = 'none';
                    document.getElementById('campos_tercero_out').style.display = 'none';

                    // Mostrar según selección
                    if (this.value === 'FUERZA MAYOR') {
                        document.getElementById('motivo_fuerza_mayor_out').style.display = 'block';
                    } else if (this.value === 'DOCUMENTO_TITULAR') {
                        document.getElementById('campos_titular_out').style.display = 'block';
                    } else if (this.value === 'DOCUMENTO_TERCERO') {
                        document.getElementById('campos_tercero_out').style.display = 'block';
                    }
                });
            }

            // Valor automático del equipo para OUT
            const modeloEquipoOUT = document.getElementById('modeloEquipoOUT');
            const valorEquipoOUT = document.getElementById('valorEquipoOUT');

            if (modeloEquipoOUT && valorEquipoOUT) {
                modeloEquipoOUT.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const valor = selectedOption.getAttribute('data-valor');
                    valorEquipoOUT.value = valor || '';
                });
            }

            // Tipificación para OUT
            const tipoGeneralOUT = document.getElementById('tipo_general_out');
            const tipoEspecificoOUT = document.getElementById('tipo_especifico_out');
            const valorEquipoDivOUT = document.getElementById('valorEquipoDivOUT');
            const reagendamientoInputsOUT = document.getElementById('reagendamientoInputsOUT');

            if (tipoGeneralOUT) {
                tipoGeneralOUT.addEventListener('change', function() {
                    tipoEspecificoOUT.innerHTML = '';

                    if (this.value === 'NO_EXITOSO') {
                        valorEquipoDivOUT.style.display = 'none';
                        const opciones = ["CLIENTE NO CONTESTA", "ID VISION PERDIDO", "CLIENTE REHUSADO",
                            "ENTREGA SIM", "SIN REAGENDAMIENTO POR AUSENCIA"
                        ];

                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'Seleccione una opción';
                        tipoEspecificoOUT.appendChild(defaultOption);

                        opciones.forEach(opcion => {
                            const option = document.createElement('option');
                            option.value = opcion;
                            option.textContent = opcion;
                            tipoEspecificoOUT.appendChild(option);
                        });

                        tipoEspecificoOUT.style.display = 'block';
                        reagendamientoInputsOUT.style.display = 'none';
                    } else if (this.value === 'EXITOSA') {
                        valorEquipoDivOUT.style.display = 'block';

                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'Seleccione una opción';
                        tipoEspecificoOUT.appendChild(defaultOption);

                        const opciones = ['ENTREGA EXITOSA', 'CAMBIO LEVE'];
                        opciones.forEach(opcion => {
                            const option = document.createElement('option');
                            option.value = opcion;
                            option.textContent = opcion;
                            tipoEspecificoOUT.appendChild(option);
                        });

                        tipoEspecificoOUT.style.display = 'block';
                        reagendamientoInputsOUT.style.display = 'none';
                    } else if (this.value === 'REAGENDAMIENTO') {
                        valorEquipoDivOUT.style.display = 'block';

                        const defaultOption = document.createElement('option');
                        defaultOption.value = '';
                        defaultOption.textContent = 'Seleccione una opción';
                        tipoEspecificoOUT.appendChild(defaultOption);

                        const opciones = ['ENTREGA EXITOSA', 'ENTREGA NO EXITOSA'];
                        opciones.forEach(opcion => {
                            const option = document.createElement('option');
                            option.value = opcion;
                            option.textContent = opcion;
                            tipoEspecificoOUT.appendChild(option);
                        });

                        tipoEspecificoOUT.style.display = 'block';
                        reagendamientoInputsOUT.style.display = 'block';
                    } else {
                        tipoEspecificoOUT.style.display = 'none';
                        reagendamientoInputsOUT.style.display = 'none';
                        valorEquipoDivOUT.style.display = 'none';
                    }
                });
            }

            // ============================
            // FUNCIÓN PARA MANEJAR CAMPOS REQUIRED DINÁMICAMENTE
            // ============================
            function toggleRequiredFields(modo) {
                const camposINSelectors = [
                    'select[name="transportadora"]:not([id])',
                    'select[name="aliado"]#aliado',
                    'select[name="tipoNovedad"]#tipo_novedad',
                    'select[name="tipoTercero"]:not([id])',
                    'select[name="estadoMotorizado"]:not([id])'
                ];

                const camposOUTSelectors = [
                    'select[name="transportadora2"]#transportadoraOUT',
                    'select[name="aliado2"]#aliadoOUT',
                    'select[name="tipoNovedad2"]#tipo_novedad_out',
                    'select[name="tipoTercero2"]#tipoTerceroOUT',
                    'select[name="estadoMotorizado2"]#estadoMotorizadoOUT'
                ];

                if (modo === 'IN') {
                    camposINSelectors.forEach(selector => {
                        const elemento = document.querySelector(selector);
                        if (elemento) elemento.setAttribute('required', 'required');
                    });

                    camposOUTSelectors.forEach(selector => {
                        const elemento = document.querySelector(selector);
                        if (elemento) elemento.removeAttribute('required');
                    });

                } else if (modo === 'OUT') {
                    camposINSelectors.forEach(selector => {
                        const elemento = document.querySelector(selector);
                        if (elemento) elemento.removeAttribute('required');
                    });

                    camposOUTSelectors.forEach(selector => {
                        const elemento = document.querySelector(selector);
                        if (elemento) elemento.setAttribute('required', 'required');
                    });
                }
            }

            // ============================
            // VALIDACIÓN ANTES DEL ENVÍO
            // ============================
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const tipoLlamada = document.getElementById('tipoLlamadaRescate').value;

                    if (tipoLlamada === 'OUT') {
                        // Verificar que los campos principales tengan valores
                        const camposRequeridos = ['lineaTitular2', 'transportadora2', 'aliado2',
                            'tipoNovedad2'
                        ];
                        let camposFaltantes = [];

                        camposRequeridos.forEach(campo => {
                            const elemento = document.querySelector(`[name="${campo}"]`);
                            if (elemento && !elemento.value) {
                                camposFaltantes.push(campo);
                            }
                        });

                        if (camposFaltantes.length > 0) {
                            e.preventDefault();
                            alert('Por favor complete los campos requeridos: ' + camposFaltantes.join(
                                ', '));
                            return false;
                        }

                        // Validar que al menos se haya hecho una búsqueda
                        const lineaTitular = document.getElementById('lineaTitularOUT').value;
                        if (!lineaTitular) {
                            e.preventDefault();
                            alert('Para el modo OUT debe buscar primero un registro por línea titular');
                            return false;
                        }

                        console.log('Formulario OUT enviado correctamente');
                    }
                });
            }
        });


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
                        const opciones = ["CLIENTE NO CONTESTA", "ID VISION PERDIDO", "CLIENTE REHUSADO",
                            "ENTREGA SIM", "SIN REAGENDAMIENTO POR AUSENCIA"
                        ];

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
                    } else if (this.value === 'EXITOSA') {
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
                    } else if (this.value === 'REAGENDAMIENTO') {
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
                    } else {
                        // Si no hay selección, ocultar todo
                        tipoEspecificoSelect.style.display = 'none';
                        reagendamientoInputs.style.display = 'none';
                        valorEquipoDiv.style.display = 'none';
                    }
                });
            }
        });
    </script>

    {{-- CIUDAD DEPART --}}

    <script>
        let $Tipificacion_detalle_1 = document.getElementById('Tipificacion_detalle_1')
        let $Tipificacion_detalle_2 = document.getElementById('Tipificacion_detalle_2')

        let tp1 = ['Amazonas',
            'Antioquia',
            'Arauca',
            'Atlántico',
            'Bolívar',
            'Boyacá',
            'Caldas',
            'Caquetá',
            'Casanare',
            'Cauca',
            'Cesar',
            'Chocó',
            'Córdoba',
            'Cundinamarca',
            'Guainía',
            'Guaviare',
            'Huila',
            'La Guajira',
            'Magdalena',
            'Meta',
            'Nariño',
            'Norte de Santander',
            'Putumayo',
            'Quindío',
            'Risaralda',
            'San Andrés y Providencia',
            'Santander',
            'Sucre',
            'Tolima',
            'Valle del Cauca',
            'Vaupés',
            'Vichada',
        ]


        let tp2 = ['Leticia', 'La Chorrera', 'La Pedrera', 'La Victoria', 'Mirití Paraná', 'Puerto Alegría', 'Puerto Arica',
            'Puerto Nariño', 'Puerto Santander', 'Tarapacá',
            'Medellin', 'Abejorral', 'Abriaquí', 'Alejandría', 'Amagá', 'Amalfi', 'Andes', 'Angelópolis', 'Angostura',
            'Anorí', 'Anzá', 'Apartadó', 'Arboletes', 'Argelia', 'Armenia', 'Barbosa', 'Bello', 'Belmira', 'Betania',
            'Betulia', 'Briceño', 'Buriticá', 'Cáceres', 'Caicedo', 'Caldas', 'Campamento', 'Cañasgordas', 'Caracolí',
            'Caramanta', 'Carepa', 'Carolina del Príncipe',
            'Caucasia', 'Chigorodó', 'Cisneros', 'Ciudad Bolívar', 'Cocorná', 'Concepción', 'Concordia', 'Copacabana',
            'Dabeiba', 'Donmatías', 'Ebéjico', 'El Bagre', 'El Carmen de Viboral', 'El Peñol', 'El Retiro',
            'El Santuario', 'Entrerríos', 'Envigado', 'Fredonia', 'Frontino', 'Giraldo', 'Girardota', 'Gómez Plata',
            'Granada', 'Guadalupe', 'Guarne', 'Guatapé', 'Heliconia', 'Hispania', 'Itagüí',
            'Ituango', 'Jardín', 'Jericó', 'La Ceja', 'La Estrella', 'La Pintada', 'La Unión', 'Liborina', 'Maceo',
            'Marinilla', 'Montebello', 'Murindó', 'Mutatá', 'Nariño', 'Nechí', 'Necoclí', 'Olaya', 'Peque',
            'Pueblorrico', 'Puerto Berrío', 'Puerto Nare', 'Puerto Triunfo', 'Remedios', 'Rionegro', 'Sabanalarga',
            'Sabaneta', 'Salgar',
            'San Andrés de Cuerquia', 'San Carlos', 'San Francisco', 'San Jerónimo', 'San José de la Montaña',
            'San Juan de Urabá', 'San Luis', 'San Pedro de los Milagros', 'San Pedro de Urabá', 'San Rafael',
            'San Roque', 'San Vicente', 'Santa Bárbara', 'Santa Fe de Antioquia', 'Santa Rosa de Osos', 'Santo Domingo',
            'Segovia', 'Sonsón', 'Sopetrán', 'Támesis', 'Tarazá', 'Tarso', 'Titiribí', 'Toledo', 'Turbo',
            'Uramita', 'Urrao', 'Valdivia', 'Valparaíso', 'Vegachí', 'Venecia', 'Vigía del Fuerte', 'Yalí', 'Yarumal',
            'Yolombó', 'Yondó', 'Zaragoza',
            'Arauca', 'Arauquita', 'Cravo Norte', 'Fortul', 'Puerto Rondón', 'Saravena', 'Tame',
            'Barranquilla', 'Baranoa', 'Campo de la Cruz', 'Candelaria', 'Galapa', 'Juan de Acosta', 'Luruaco',
            'Malambo', 'Manatí', 'Palmar de Varela', 'Piojó', 'Polonuevo', 'Ponedera', 'Puerto Colombia', 'Repelón',
            'Sabanagrande', 'Sabanalarga', 'Santa Lucía', 'Santo Tomás', 'Soledad', 'Suan', 'Tubará', 'Usiacurí',
            'Cartagena de Indias', 'Achí', 'Altos del Rosario', 'Arenal', 'Arjona', 'Arroyohondo', 'Barranco de Loba',
            'Calamar', 'Cantagallo', 'Cicuco', 'Clemencia', 'Córdoba', 'El Carmen de Bolívar', 'El Guamo', 'El Peñón',
            'Hatillo de Loba', 'Magangué', 'Mahates', 'Margarita ', 'María La Baja', 'Montecristo', 'Morales', 'Norosí',
            'Pinillos', 'Regidor', 'Río Viejo', 'San Cristóbal', 'San Estanislao',
            'San Fernando', 'San Jacinto', 'San Jacinto del Cauca', 'San Juan Nepomuceno', 'San Martín de Loba',
            'San Pablo', 'Santa Catalina', 'Santa Cruz de Mompox', 'Santa Rosa', 'Santa Rosa del Sur', 'Simití',
            'Soplaviento', 'Talaigua Nuevo', 'Tiquisio', 'Turbaco', 'Turbaná', 'Villanueva', 'Zambrano',
            'Tunja', 'Almeida', 'Aquitania', 'Arcabuco', 'Belén', 'Berbeo', 'Betéitiva', 'Boavita', 'Boyacá', 'Briceño',
            'Buenavista', 'Busbanzá', 'Caldas', 'Campohermoso', 'Cerinza', 'Chinavita', 'Chiquinquirá', 'Chíquiza',
            'Chiscas', 'Chita', 'Chitaraque', 'Chivatá', 'Chivor', 'Ciénega', 'Cómbita', 'Coper', 'Corrales',
            'Covarachía', 'Cubará', 'Cucaita', 'Cuítiva', 'Duitama', 'El Cocuy', 'El Espino', 'Firavitoba', 'Floresta',
            'Gachantivá', 'Gámeza', 'Garagoa', 'Guacamayas', 'Guateque', 'Guayatá', 'Güicán', 'Iza', 'Jenesano',
            'Jericó',
            'La Capilla', 'La Uvita', 'La Victoria', 'Labranzagrande', 'Macanal', 'Maripí', 'Miraflores', 'Mongua',
            'Monguí', 'Moniquirá', 'Motavita', , 'Muzo', 'Nobsa', 'Nuevo Colón', 'Oicatá', 'Otanche', 'Pachavita',
            'Páez', 'Paipa', 'Pajarito', 'Panqueba', 'Pauna', 'Paya', 'Paz de Río', 'Pesca', 'Pisba', 'Puerto Boyacá',
            'Quípama', 'Ramiriquí', 'Ráquira', 'Rondón', 'Saboyá', 'Sáchica', 'Samacá', 'San Eduardo',
            'San José de Pare', 'San Luis de Gaceno', 'San Mateo', 'San Miguel de Sema', 'San Pablo de Borbur',
            'Santa María', 'Santa Rosa de Viterbo',
            'Santa Sofía', 'Santana', 'Sativanorte', 'Sativasur', 'Siachoque', 'Soatá', 'Socha', 'Socotá', 'Sogamoso',
            'Somondoco', 'Sora', 'Soracá', 'Sotaquirá', 'Susacón', 'Sutamarchán', 'Sutatenza', 'Tasco', 'Tenza',
            'Tibaná', 'Tibasosa', 'Tinjacá', 'Tipacoque', 'Toca', 'Togüí', 'Tópaga', 'Tota', 'Tununguá', 'Turmequé',
            'Tuta', 'Tutazá', 'Úmbita', 'Ventaquemada', 'Villa de Leyva', 'Viracachá', 'Zetaquira',
            'Risaralda', 'Aguadas', 'Anserma', 'Aranzazu', 'Belalcázar', 'Chinchiná', 'Filadelfia', 'La Dorada',
            'La Merced', 'Manizales', 'Manzanares', 'Marmato', 'Marquetalia', 'Marulanda', 'Neira', 'Norcasia',
            'Pácora', 'Palestina', 'Pensilvania', 'Riosucio', 'Salamina', 'Samaná', 'San José', 'Supía', 'Victoria',
            'Villamaría', 'Viterbo',
            'Florencia', 'Albania', 'Belén de los Andaquíes', 'Cartagena del Chairá', 'Curillo', 'El Doncello',
            'El Paujil', 'La Montañita', 'Morelia', 'Puerto Milán', 'Puerto Rico', 'San José del Fragua',
            'San Vicente del Caguán', 'Solano', 'Solita', 'Valparaíso',
            'Yopal', 'Aguazul', 'Chámeza', 'Hato Corozal', 'La Salina', 'Maní', 'Monterrey', 'Nunchía', 'Orocué',
            'Paz de Ariporo', 'Pore', 'Recetor', 'Sabanalarga', 'Sácama', 'San Luis de Palenque', 'Támara', 'Tauramena',
            'Trinidad', 'Villanueva',
            'Popayán', 'Almaguer', 'Argelia', 'Balboa', 'Bolívar', 'Buenos Aires', 'Cajibío', 'Caldono', 'Caloto',
            'Corinto', 'El Tambo', 'Florencia', 'Guachené', 'Guapi', 'Inzá', 'Jambaló', 'La Sierra', 'La Vega',
            'López de Micay', 'Mercaderes', 'Miranda', 'Morales', 'Padilla', 'Páez', 'Patía', 'Piamonte', 'Piendamó',
            'Puerto Tejada', 'Puracé-Coconuco', 'Rosas', 'San Sebastián', 'Santa Rosa', 'Santander de Quilichao',
            'Silvia', 'Sotará', 'Suárez', 'Sucre', 'Timbío', 'Timbiquí', 'Toribío', 'Totoró', 'Villa Rica',
            'Valledupar', 'Aguachica', 'Agustín Codazzi', 'Astrea', 'Becerril', 'Bosconia', 'Chimichagua', 'Chiriguaná',
            'Curumaní', 'El Copey', 'El Paso', 'Gamarra', 'González', 'La Gloria', 'La Jagua de Ibirico', 'La Paz',
            'Manaure Balcón del Cesar', 'Pailitas', 'Pelaya', 'Pueblo Bello', 'Río de Oro', 'San Alberto', 'San Diego',
            'San Martín', 'Tamalameque',
            'Quibdó', 'Acandí', 'Alto Baudó', 'Atrato', 'Bagadó', 'Bahía Solano', 'Bajo Baudó', 'Bojayá', 'Cértegui',
            'Condoto', 'El Cantón de San Pablo', 'El Carmen de Atrato', 'El Carmen del Darién',
            'El Litoral de San Juan', 'Istmina', 'Juradó', 'Lloró', 'Medio Atrato', 'Medio Baudó', 'Medio San Juan',
            'Nóvita', 'Nuquí', 'Río Iró', 'Río Quito', 'Riosucio', 'San José del Palmar', 'Sipí', 'Tadó', 'Unguía',
            'Unión Panamericana',
            'Montería', 'Ayapel', 'Buenavista', 'Canalete', 'Cereté', 'Chimá', 'Chinú', 'Ciénaga de Oro', 'Cotorra',
            'La Apartada', 'Los Córdobas', 'Momil', 'Montelíbano', 'Moñitos', 'Planeta Rica', 'Pueblo Nuevo',
            'Puerto Escondido', 'Puerto Libertador', 'Purísima', 'Sahagún', 'San Andrés de Sotavento', 'San Antero',
            'San Bernardo del Viento', 'San Carlos', 'San José de Uré', 'San Pelayo', 'Santa Cruz de Lorica',
            'Tierralta', 'Tuchín', 'Valencia',
            'Agua de Dios', 'Albán', 'Anapoima', 'Anolaima', 'Apulo', 'Arbeláez', 'Beltrán', 'Bituima', 'Bojacá',
            'Bogota', 'Cabrera', 'Cajicá', 'Caparrapí', 'Cáqueza', 'Carmen de Carupa', 'Chaguaní', 'Chía', 'Chipaque',
            'Choachí', 'Chocontá', 'Cogua', 'Cota', 'Cucunubá', 'El Colegio', 'El Peñón', 'El Rosal', 'Facatativá',
            'Fómeque', 'Fosca', 'Funza', 'Fúquene', 'Fusagasugá', 'Gachalá', 'Gachancipá', 'Gachetá', 'Gama',
            'Girardot', 'Granada', 'Guachetá', 'Guaduas', 'Guasca', 'Guataquí', 'Guatavita', 'Guayabal de Síquima',
            'Guayabetal', 'Gutiérrez', 'Jerusalén', 'Junín', 'La Calera', 'La Mesa', 'La Palma', 'La Peña', 'La Vega',
            'Lenguazaque', 'Machetá', 'Madrid',
            'Manta', 'Medina', 'Mosquera', 'Nariño', 'Nemocón', 'Nilo', 'Nimaima', 'Nocaima', 'Pacho', 'Paime', 'Pandi',
            'Paratebueno', 'Pasca', 'Puerto Salgar', 'Pulí', 'Quebradanegra', 'Quetame', 'Quipile', 'Ricaurte',
            'San Antonio del Tequendama', 'SanBernardo', 'SanCayetano', 'San Francisco', 'San Juan de Rioseco',
            'Sasaima', 'Sesquilé', 'Sibaté', 'Silvania', 'Simijaca', 'Soacha', 'Sopó', 'Subachoque', 'Suesca', 'Supatá',
            'Susa', 'Sutatausa', 'Tabio', 'Tausa', 'Tena', 'Tenjo', 'Tibacuy', 'Tibirita', 'Tocaima', 'Tocancipá',
            'Topaipí', 'Ubalá', 'Ubaque', 'Ubaté', 'Une', 'Útica', 'Venecia', 'Vergara', 'Vianí', 'Villagómez',
            'Villapinzón', 'Villeta', 'Viotá',
            'Yacopí', 'Zipacón', 'Zipaquirás', 'Inírida', 'Barrancominas', 'Cacahual', 'La Guadalupe', 'Morichal Nuevo',
            'Pana Pana', 'Puerto Colombia', 'San Felipe', 'San José del Guaviare ', 'Calamar', 'El Retorno',
            'Miraflores', 'Neiva', 'Acevedo', 'Agrado', 'Aipe', 'Algeciras', 'Altamira', 'Baraya', 'Campoalegre',
            'Colombia', 'Elías', 'Garzón', 'Gigante', 'Guadalupe', 'Hobo', 'Íquira', 'Isnos', 'La Argentina',
            'La Plata', 'Nátaga', 'Oporapa', 'Paicol', 'Palermo', 'Palestina', 'Pital', 'Pitalito', 'Rivera',
            'Saladoblanco', 'San Agustín', 'Santa María', 'Suaza', 'Tarqui', 'Tello', 'Teruel', 'Tesalia', 'Timaná',
            'Villavieja', 'Yaguará', 'Riohacha', 'Albania', 'Barrancas',
            'Dibulla', 'Distracción', 'El Molino', 'Fonseca', 'Hatonuevo', 'La Jagua del Pilar', 'Maicao', 'Manaure',
            'San Juan del Cesar', 'Uribia', 'Urumita', 'Villanueva', 'Santa Marta', 'Algarrobo', 'Aracataca',
            'Ariguaní', 'Cerro de San Antonio', 'Chibolo', 'Ciénaga', 'Concordia', 'El Banco', 'El Piñón', 'El Retén',
            'Fundación', 'Guamal', 'Nueva Granada', 'Pedraza', 'Pijiño del Carmen', 'Pivijay', 'Plato', 'Pueblo Viejo',
            'Remolino', 'Sabanas de San Ángel', 'Salamina', 'San Sebastián de Buenavista', 'San Zenón', 'Santa Ana',
            'Santa Bárbara de Pinto', 'Sitionuevo', 'Tenerife', 'Zapayán', 'Zona Bananera', 'Villavicencio', 'Acacías',
            'Barranca de Upía', 'Cabuyaro',
            'Castilla La Nueva', 'Cubarral', 'Cumaral', 'El Calvario', 'El Castillo', 'El Dorado', 'Fuente de Oro',
            'Granada', 'Guamal', 'La Macarena', 'La Uribe', 'Lejanías', 'Mapiripán', 'Mesetas', 'Puerto Concordia',
            'Puerto Gaitán', 'Puerto Lleras', 'Puerto López', 'Puerto Rico', 'Restrepo', 'San Carlos de Guaroa',
            'SanJuan de Arama', 'San Juanito', 'San Martín', 'Vista Hermosa', 'Pasto', 'Albán', 'Aldana', 'Ancuya',
            'Arboleda', 'Barbacoas', 'Belén', 'Buesaco', 'Chachagüí', 'Colón', 'Consacá', 'Contadero', 'Córdoba',
            'Cuaspud', 'Cumbal', 'Cumbitara', 'El Charco', 'El Peñol', 'El Rosario', 'El Tablón de Gómez', 'El Tambo',
            'Francisco Pizarro', 'Funes', 'Guachucal',
            'Guaitarilla', 'Gualmatán', 'Iles', 'Imués', 'Ipiales', 'La Cruz', 'La Florida', 'La Llanada', 'La Tola',
            'La Unión', 'Leiva', 'Linares', 'Los Andes', 'Magüí Payán', 'Mallama', 'Mosquera', 'Nariño',
            'Olaya Herrera', 'Ospina', 'Policarpa', 'Potosí', 'Providencia', 'Puerres', 'Pupiales', 'Ricaurte',
            'Roberto Payán', 'Samaniego', 'San Bernardo', 'San Lorenzo', 'San Pablo', 'San Pedro de Cartago', 'Sandoná',
            'Santa Bárbara', 'Santacruz', 'SapuyesTaminango', 'Tangua', 'Tumaco', 'Túquerres', 'Yacuanquer', 'Cúcuta',
            'Ábrego', 'Arboledas', 'Bochalema', 'Bucarasica', 'Cáchira', 'Cácota', 'Chinácota', 'Chitagá', 'Convención',
            'Cucutilla', 'Durania', 'El Carmen',
            'El Tarra', 'El Zulia', 'Gramalote', 'Hacarí', 'Herrán', 'La Esperanza', 'La Playa de Belén', 'Labateca',
            'Los Patios', 'Lourdes', 'Mutiscua', 'Ocaña', 'Pamplona', 'Pamplonita', 'Puerto Santander', 'Ragonvalia',
            'Salazar de Las Palmas', 'San Calixto', 'San Cayetano', 'Santiago', 'Santo Domingo de Silos', 'Sardinata',
            'Teorama', 'Tibú', 'Toledo', 'Villa Caro', 'Villa del Rosario', 'Mocoa', 'Colón', 'Orito', 'Puerto Asís',
            'Puerto Caicedo', 'Puerto Guzmán', 'Puerto Leguízamo', 'San Francisco', 'San Miguel', 'Santiago',
            'Sibundoy', 'Valle del Guamuez', 'Villagarzón', 'Armenia', 'Buenavista', 'Calarcá', 'Circasia', 'Córdoba',
            'Filandia', 'Génova', 'La Tebaida',
            'Montenegro', 'Pijao', 'Quimbaya', 'Salento', 'Pereira', 'Apía', 'Balboa', 'Belén de Umbría',
            'Dosquebradas', 'Guática', 'La Celia', 'La Virginia', 'Marsella', 'Mistrató', 'Pueblo Rico', 'Quinchía',
            'Santa Rosa de Cabal', 'Santuario', 'San Andres Isla', 'Providencia', 'Santa Catalina', 'Bucaramanga',
            'Aguada', 'Albania', 'Aratoca', 'Barbosa', 'Barichara', 'Barrancabermeja', 'Betulia', 'Bolívar', 'Cabrera',
            'California', 'Capitanejo', 'Carcasí', 'Cepitá', 'Cerrito', 'Charalá', 'Charta', 'Chima', 'Chipatá',
            'Cimitarra', 'Concepción', 'Confines', 'Contratación', 'Coromoro', 'Curití', 'El Carmen de Chucurí',
            'El Guacamayo', 'El Peñón', 'El Playón', 'Encino',
            'Enciso', 'Florián', 'Floridablanca', 'Galán', 'Gámbita', 'Girón', 'Guaca', 'Guadalupe', 'Guapotá',
            'Guavatá', 'Güepsa', 'Hato', 'Jesús María', 'Jordán', 'La Belleza', 'La Paz', 'Landázuri', 'Lebrija',
            'Los Santos', 'Macaravita', 'Málaga', 'Matanza', 'Mogotes', 'Molagavita', 'Ocamonte', 'Oiba', 'Onzaga',
            'Palmar', 'Palmas del Socorro', 'Páramo', 'Piedecuesta', 'Pinchote', 'Puente Nacional', 'Puerto Parra',
            'Puerto Wilches', 'Rionegro', 'Sabana de Torres', 'San Andrés', 'San Benito', 'San Gil', 'San Joaquín',
            'San José de Miranda', 'San Miguel', 'San Vicente de Chucurí', 'Santa Bárbara', 'Santa Helena del Opón',
            'Simacota', 'Socorro', 'Suaita', 'Sucre',
            'Suratá', 'Tona', 'Valle de San José', 'Vélez', 'Vetas', 'Villanueva', 'Zapatoca', 'Sincelejo',
            'Buenavista', 'Caimito', 'Chalán', 'Colosó', 'Corozal', 'Coveñas', 'El Roble', 'Galeras', 'Guaranda',
            'La Unión', 'Los Palmitos', 'Majagual', 'Morroa', 'Ovejas', 'Palmito', 'Sampués', 'San Benito Abad',
            'San Juan de Betulia', 'San Marcos', 'San Onofre', 'San Pedro', 'Santiago de Tolú', 'Sincé', 'Sucre',
            'Toluviejo', 'Ibagué', 'Alpujarra', 'Alvarado', 'Ambalema', 'Anzoátegui', 'Armero', 'Ataco', 'Cajamarca',
            'Carmen de Apicalá', 'Casabianca', 'Chaparral', 'Coello', 'Coyaima', 'Cunday', 'Dolores', 'Espinal',
            'Falan', 'Flandes', 'Fresno', 'Guamo', 'Herveo',
            'Honda ', 'Icononzo', 'Lérida', 'Líbano', 'Melgar', 'Murillo', 'Natagaima', 'Ortega', 'Palocabildo',
            'Piedras', 'Planadas', 'Prado', 'Purificación', 'Rioblanco', 'Roncesvalles', 'Rovira', 'Saldaña',
            'San Antonio', 'San Luis', 'San Sebastián de Mariquita', 'Santa Isabel', 'Suárez', 'Valle de San Juan',
            'Venadillo', 'Villahermosa', 'Villarrica', 'Cali', 'Alcalá', 'Andalucía', 'Ansermanuevo', 'Argelia',
            'Bolívar', 'Buenaventura', 'Buga', 'Bugalagrande', 'Caicedonia', 'Calima El Darién', 'Candelaria',
            'Cartago', 'Dagua', 'El Águila', 'El Cairo', ' El Cerrito', 'El Dovio', 'Florida', 'Ginebra', 'Guacarí',
            'Jamundí', 'La Cumbre', 'La Unión', 'La Victoria',
            'Obando', 'Palmira', 'Pradera', 'Restrepo', 'Riofrío', 'Roldanillo', 'San Pedro', 'Sevilla', 'Toro',
            'Trujillo', 'Tuluá', 'Ulloa', 'Versalles', 'Vijes', 'Yotoco', 'Yumbo', 'Zarzal', 'Mitú', 'Carurú', 'Pacoa',
            'Papunaua', 'Taraira', 'Yavaraté', 'Puerto Carreño', 'Cumaribo', 'La Primavera', 'Santa Rosalía',

        ]

        function mostrarLugares(arreglo, lugar) {
            let elementos = '<option selected disables>Departamento</option>'

            for (let i = 0; i < arreglo.length; i++) {
                elementos += '<option value="' + arreglo[i] + '">' + arreglo[i] + '</option>'
            }
            lugar.innerHTML = elementos
        }

        mostrarLugares(tp1, $Tipificacion_detalle_1)

        function recortar(array, inicio, fin, lugar) {
            let recortar = array.slice(inicio, fin)
            mostrarLugares(recortar, lugar)
        }

        $Tipificacion_detalle_1.addEventListener('change', function() {
            let valor = $Tipificacion_detalle_1.value

            switch (valor) {
                case 'Amazonas':
                    recortar(tp2, 0, 10, $Tipificacion_detalle_2)
                    break
                case 'Antioquia':
                    recortar(tp2, 10, 135, $Tipificacion_detalle_2)
                    break
                case 'Arauca':
                    recortar(tp2, 135, 142, $Tipificacion_detalle_2)
                    break
                case 'Atlántico':
                    recortar(tp2, 142, 165, $Tipificacion_detalle_2)
                    break
                case 'Bolívar':
                    recortar(tp2, 165, 211, $Tipificacion_detalle_2)
                    break
                case 'Boyacá':
                    recortar(tp2, 211, 335, $Tipificacion_detalle_2)
                    break
                case 'Caldas':
                    recortar(tp2, 335, 362, $Tipificacion_detalle_2)
                    break
                case 'Caquetá':
                    recortar(tp2, 362, 378, $Tipificacion_detalle_2)
                    break
                case 'Casanare':
                    recortar(tp2, 378, 397, $Tipificacion_detalle_2)
                    break
                case 'Cauca':
                    recortar(tp2, 397, 439, $Tipificacion_detalle_2)
                    break
                case 'Cesar':
                    recortar(tp2, 439, 464, $Tipificacion_detalle_2)
                    break
                case 'Chocó':
                    recortar(tp2, 464, 494, $Tipificacion_detalle_2)
                    break
                case 'Córdoba':
                    recortar(tp2, 494, 524, $Tipificacion_detalle_2)
                    break
                case 'Cundinamarca':
                    recortar(tp2, 524, 640, $Tipificacion_detalle_2)
                    break
                case 'Guainía':
                    recortar(tp2, 640, 648, $Tipificacion_detalle_2)
                    break
                case 'Guaviare':
                    recortar(tp2, 648, 652, $Tipificacion_detalle_2)
                    break
                case 'Huila':
                    recortar(tp2, 652, 689, $Tipificacion_detalle_2)
                    break
                case 'La Guajira':
                    recortar(tp2, 689, 704, $Tipificacion_detalle_2)
                    break
                case 'Magdalena':
                    recortar(tp2, 704, 734, $Tipificacion_detalle_2)
                    break
                case 'Meta':
                    recortar(tp2, 734, 763, $Tipificacion_detalle_2)
                    break
                case 'Nariño':
                    recortar(tp2, 763, 826, $Tipificacion_detalle_2)
                    break
                case 'Norte de Santander':
                    recortar(tp2, 826, 866, $Tipificacion_detalle_2)
                    break
                case 'Putumayo':
                    recortar(tp2, 866, 879, $Tipificacion_detalle_2)
                    break
                case 'Quindío':
                    recortar(tp2, 879, 891, $Tipificacion_detalle_2)
                    break
                case 'Risaralda':
                    recortar(tp2, 891, 905, $Tipificacion_detalle_2)
                    break
                case 'San Andrés y Providencia':
                    recortar(tp2, 905, 908, $Tipificacion_detalle_2)
                    break
                case 'Santander':
                    recortar(tp2, 908, 995, $Tipificacion_detalle_2)
                    break
                case 'Sucre':
                    recortar(tp2, 995, 1021, $Tipificacion_detalle_2)
                    break
                case 'Tolima':
                    recortar(tp2, 1021, 1068, $Tipificacion_detalle_2)
                    break
                case 'Valle del Cauca':
                    recortar(tp2, 1068, 1110, $Tipificacion_detalle_2)
                    break
                case 'Vaupés':
                    recortar(tp2, 1110, 1116, $Tipificacion_detalle_2)
                    break
                case 'Vichada':
                    recortar(tp2, 1116, 1120, $Tipificacion_detalle_2)
                    break
            }

            $Tipificacion_detalle_3.innerHTML = ''
        })


        document.addEventListener('DOMContentLoaded', function() {

            // Elementos para OUT
            let $departamentoOUT = document.getElementById('departamentoOUT');
            let $ciudadOUT = document.getElementById('ciudadOUT');

            // Arrays de departamentos y ciudades (los mismos que ya tienes para IN)
            let departamentosOUT = ['Amazonas', 'Antioquia', 'Arauca', 'Atlántico', 'Bolívar', 'Boyacá', 'Caldas',
                'Caquetá', 'Casanare', 'Cauca', 'Cesar', 'Chocó', 'Córdoba', 'Cundinamarca', 'Guainía',
                'Guaviare', 'Huila', 'La Guajira', 'Magdalena', 'Meta', 'Nariño', 'Norte de Santander',
                'Putumayo', 'Quindío', 'Risaralda', 'San Andrés y Providencia', 'Santander', 'Sucre', 'Tolima',
                'Valle del Cauca', 'Vaupés', 'Vichada'
            ];

            let ciudadesOUT = ['Leticia', 'La Chorrera', 'La Pedrera', 'La Victoria', 'Mirití Paraná',
                'Puerto Alegría', 'Puerto Arica', 'Puerto Nariño', 'Puerto Santander', 'Tarapacá',
                'Medellin', 'Abejorral', 'Abriaquí', 'Alejandría', 'Amagá', 'Amalfi', 'Andes', 'Angelópolis',
                'Angostura', 'Anorí', 'Anzá', 'Apartadó', 'Arboletes', 'Argelia', 'Armenia', 'Barbosa', 'Bello',
                'Belmira', 'Betania', 'Betulia', 'Briceño', 'Buriticá', 'Cáceres', 'Caicedo', 'Caldas',
                'Campamento', 'Cañasgordas', 'Caracolí', 'Caramanta', 'Carepa', 'Carolina del Príncipe',
                'Caucasia', 'Chigorodó', 'Cisneros', 'Ciudad Bolívar', 'Cocorná', 'Concepción', 'Concordia',
                'Copacabana', 'Dabeiba', 'Donmatías', 'Ebéjico', 'El Bagre', 'El Carmen de Viboral', 'El Peñol',
                'El Retiro', 'El Santuario', 'Entrerríos', 'Envigado', 'Fredonia', 'Frontino', 'Giraldo',
                'Girardota', 'Gómez Plata', 'Granada', 'Guadalupe', 'Guarne', 'Guatapé', 'Heliconia',
                'Hispania', 'Itagüí', 'Ituango', 'Jardín', 'Jericó', 'La Ceja', 'La Estrella', 'La Pintada',
                'La Unión', 'Liborina', 'Maceo', 'Marinilla', 'Montebello', 'Murindó', 'Mutatá', 'Nariño',
                'Nechí', 'Necoclí', 'Olaya', 'Peque', 'Pueblorrico', 'Puerto Berrío', 'Puerto Nare',
                'Puerto Triunfo', 'Remedios', 'Rionegro', 'Sabanalarga', 'Sabaneta', 'Salgar',
                'San Andrés de Cuerquia', 'San Carlos', 'San Francisco', 'San Jerónimo',
                'San José de la Montaña', 'San Juan de Urabá', 'San Luis', 'San Pedro de los Milagros',
                'San Pedro de Urabá', 'San Rafael', 'San Roque', 'San Vicente', 'Santa Bárbara',
                'Santa Fe de Antioquia', 'Santa Rosa de Osos', 'Santo Domingo', 'Segovia', 'Sonsón', 'Sopetrán',
                'Támesis', 'Tarazá', 'Tarso', 'Titiribí', 'Toledo', 'Turbo', 'Uramita', 'Urrao', 'Valdivia',
                'Valparaíso', 'Vegachí', 'Venecia', 'Vigía del Fuerte', 'Yalí', 'Yarumal', 'Yolombó', 'Yondó',
                'Zaragoza',
                'Arauca', 'Arauquita', 'Cravo Norte', 'Fortul', 'Puerto Rondón', 'Saravena', 'Tame',
                'Barranquilla', 'Baranoa', 'Campo de la Cruz', 'Candelaria', 'Galapa', 'Juan de Acosta',
                'Luruaco', 'Malambo', 'Manatí', 'Palmar de Varela', 'Piojó', 'Polonuevo', 'Ponedera',
                'Puerto Colombia', 'Repelón', 'Sabanagrande', 'Sabanalarga', 'Santa Lucía', 'Santo Tomás',
                'Soledad', 'Suan', 'Tubará', 'Usiacurí',
                'Cartagena de Indias', 'Achí', 'Altos del Rosario', 'Arenal', 'Arjona', 'Arroyohondo',
                'Barranco de Loba', 'Calamar', 'Cantagallo', 'Cicuco', 'Clemencia', 'Córdoba',
                'El Carmen de Bolívar', 'El Guamo', 'El Peñón', 'Hatillo de Loba', 'Magangué', 'Mahates',
                'Margarita ', 'María La Baja', 'Montecristo', 'Morales', 'Norosí', 'Pinillos', 'Regidor',
                'Río Viejo', 'San Cristóbal', 'San Estanislao', 'San Fernando', 'San Jacinto',
                'San Jacinto del Cauca', 'San Juan Nepomuceno', 'San Martín de Loba', 'San Pablo',
                'Santa Catalina', 'Santa Cruz de Mompox', 'Santa Rosa', 'Santa Rosa del Sur', 'Simití',
                'Soplaviento', 'Talaigua Nuevo', 'Tiquisio', 'Turbaco', 'Turbaná', 'Villanueva', 'Zambrano',
                'Tunja', 'Almeida', 'Aquitania', 'Arcabuco', 'Belén', 'Berbeo', 'Betéitiva', 'Boavita',
                'Boyacá', 'Briceño', 'Buenavista', 'Busbanzá', 'Caldas', 'Campohermoso', 'Cerinza', 'Chinavita',
                'Chiquinquirá', 'Chíquiza', 'Chiscas', 'Chita', 'Chitaraque', 'Chivatá', 'Chivor', 'Ciénega',
                'Cómbita', 'Coper', 'Corrales', 'Covarachía', 'Cubará', 'Cucaita', 'Cuítiva', 'Duitama',
                'El Cocuy', 'El Espino', 'Firavitoba', 'Floresta', 'Gachantivá', 'Gámeza', 'Garagoa',
                'Guacamayas', 'Guateque', 'Guayatá', 'Güicán', 'Iza', 'Jenesano', 'Jericó', 'La Capilla',
                'La Uvita', 'La Victoria', 'Labranzagrande', 'Macanal', 'Maripí', 'Miraflores', 'Mongua',
                'Monguí', 'Moniquirá', 'Motavita', 'Muzo', 'Nobsa', 'Nuevo Colón', 'Oicatá', 'Otanche',
                'Pachavita', 'Páez', 'Paipa', 'Pajarito', 'Panqueba', 'Pauna', 'Paya', 'Paz de Río', 'Pesca',
                'Pisba', 'Puerto Boyacá', 'Quípama', 'Ramiriquí', 'Ráquira', 'Rondón', 'Saboyá', 'Sáchica',
                'Samacá', 'San Eduardo', 'San José de Pare', 'San Luis de Gaceno', 'San Mateo',
                'San Miguel de Sema', 'San Pablo de Borbur', 'Santa María', 'Santa Rosa de Viterbo',
                'Santa Sofía', 'Santana', 'Sativanorte', 'Sativasur', 'Siachoque', 'Soatá', 'Socha', 'Socotá',
                'Sogamoso', 'Somondoco', 'Sora', 'Soracá', 'Sotaquirá', 'Susacón', 'Sutamarchán', 'Sutatenza',
                'Tasco', 'Tenza', 'Tibaná', 'Tibasosa', 'Tinjacá', 'Tipacoque', 'Toca', 'Togüí', 'Tópaga',
                'Tota', 'Tununguá', 'Turmequé', 'Tuta', 'Tutazá', 'Úmbita', 'Ventaquemada', 'Villa de Leyva',
                'Viracachá', 'Zetaquira',
                'Risaralda', 'Aguadas', 'Anserma', 'Aranzazu', 'Belalcázar', 'Chinchiná', 'Filadelfia',
                'La Dorada', 'La Merced', 'Manizales', 'Manzanares', 'Marmato', 'Marquetalia', 'Marulanda',
                'Neira', 'Norcasia', 'Pácora', 'Palestina', 'Pensilvania', 'Riosucio', 'Salamina', 'Samaná',
                'San José', 'Supía', 'Victoria', 'Villamaría', 'Viterbo',
                'Florencia', 'Albania', 'Belén de los Andaquíes', 'Cartagena del Chairá', 'Curillo',
                'El Doncello', 'El Paujil', 'La Montañita', 'Morelia', 'Puerto Milán', 'Puerto Rico',
                'San José del Fragua', 'San Vicente del Caguán', 'Solano', 'Solita', 'Valparaíso',
                'Yopal', 'Aguazul', 'Chámeza', 'Hato Corozal', 'La Salina', 'Maní', 'Monterrey', 'Nunchía',
                'Orocué', 'Paz de Ariporo', 'Pore', 'Recetor', 'Sabanalarga', 'Sácama', 'San Luis de Palenque',
                'Támara', 'Tauramena', 'Trinidad', 'Villanueva',
                'Popayán', 'Almaguer', 'Argelia', 'Balboa', 'Bolívar', 'Buenos Aires', 'Cajibío', 'Caldono',
                'Caloto', 'Corinto', 'El Tambo', 'Florencia', 'Guachené', 'Guapi', 'Inzá', 'Jambaló',
                'La Sierra', 'La Vega', 'López de Micay', 'Mercaderes', 'Miranda', 'Morales', 'Padilla', 'Páez',
                'Patía', 'Piamonte', 'Piendamó', 'Puerto Tejada', 'Puracé-Coconuco', 'Rosas', 'San Sebastián',
                'Santa Rosa', 'Santander de Quilichao', 'Silvia', 'Sotará', 'Suárez', 'Sucre', 'Timbío',
                'Timbiquí', 'Toribío', 'Totoró', 'Villa Rica',
                'Valledupar', 'Aguachica', 'Agustín Codazzi', 'Astrea', 'Becerril', 'Bosconia', 'Chimichagua',
                'Chiriguaná', 'Curumaní', 'El Copey', 'El Paso', 'Gamarra', 'González', 'La Gloria',
                'La Jagua de Ibirico', 'La Paz', 'Manaure Balcón del Cesar', 'Pailitas', 'Pelaya',
                'Pueblo Bello', 'Río de Oro', 'San Alberto', 'San Diego', 'San Martín', 'Tamalameque',
                'Quibdó', 'Acandí', 'Alto Baudó', 'Atrato', 'Bagadó', 'Bahía Solano', 'Bajo Baudó', 'Bojayá',
                'Cértegui', 'Condoto', 'El Cantón de San Pablo', 'El Carmen de Atrato', 'El Carmen del Darién',
                'El Litoral de San Juan', 'Istmina', 'Juradó', 'Lloró', 'Medio Atrato', 'Medio Baudó',
                'Medio San Juan', 'Nóvita', 'Nuquí', 'Río Iró', 'Río Quito', 'Riosucio', 'San José del Palmar',
                'Sipí', 'Tadó', 'Unguía', 'Unión Panamericana',
                'Montería', 'Ayapel', 'Buenavista', 'Canalete', 'Cereté', 'Chimá', 'Chinú', 'Ciénaga de Oro',
                'Cotorra', 'La Apartada', 'Los Córdobas', 'Momil', 'Montelíbano', 'Moñitos', 'Planeta Rica',
                'Pueblo Nuevo', 'Puerto Escondido', 'Puerto Libertador', 'Purísima', 'Sahagún',
                'San Andrés de Sotavento', 'San Antero', 'San Bernardo del Viento', 'San Carlos',
                'San José de Uré', 'San Pelayo', 'Santa Cruz de Lorica', 'Tierralta', 'Tuchín', 'Valencia',
                'Agua de Dios', 'Albán', 'Anapoima', 'Anolaima', 'Apulo', 'Arbeláez', 'Beltrán', 'Bituima',
                'Bojacá', 'Bogota', 'Cabrera', 'Cajicá', 'Caparrapí', 'Cáqueza', 'Carmen de Carupa', 'Chaguaní',
                'Chía', 'Chipaque', 'Choachí', 'Chocontá', 'Cogua', 'Cota', 'Cucunubá', 'El Colegio',
                'El Peñón', 'El Rosal', 'Facatativá', 'Fómeque', 'Fosca', 'Funza', 'Fúquene', 'Fusagasugá',
                'Gachalá', 'Gachancipá', 'Gachetá', 'Gama', 'Girardot', 'Granada', 'Guachetá', 'Guaduas',
                'Guasca', 'Guataquí', 'Guatavita', 'Guayabal de Síquima', 'Guayabetal', 'Gutiérrez',
                'Jerusalén', 'Junín', 'La Calera', 'La Mesa', 'La Palma', 'La Peña', 'La Vega', 'Lenguazaque',
                'Machetá', 'Madrid', 'Manta', 'Medina', 'Mosquera', 'Nariño', 'Nemocón', 'Nilo', 'Nimaima',
                'Nocaima', 'Pacho', 'Paime', 'Pandi', 'Paratebueno', 'Pasca', 'Puerto Salgar', 'Pulí',
                'Quebradanegra', 'Quetame', 'Quipile', 'Ricaurte', 'San Antonio del Tequendama', 'SanBernardo',
                'SanCayetano', 'San Francisco', 'San Juan de Rioseco', 'Sasaima', 'Sesquilé', 'Sibaté',
                'Silvania', 'Simijaca', 'Soacha', 'Sopó', 'Subachoque', 'Suesca', 'Supatá', 'Susa', 'Sutatausa',
                'Tabio', 'Tausa', 'Tena', 'Tenjo', 'Tibacuy', 'Tibirita', 'Tocaima', 'Tocancipá', 'Topaipí',
                'Ubalá', 'Ubaque', 'Ubaté', 'Une', 'Útica', 'Venecia', 'Vergara', 'Vianí', 'Villagómez',
                'Villapinzón', 'Villeta', 'Viotá', 'Yacopí', 'Zipacón', 'Zipaquirás', 'Inírida',
                'Barrancominas', 'Cacahual', 'La Guadalupe', 'Morichal Nuevo', 'Pana Pana', 'Puerto Colombia',
                'San Felipe', 'San José del Guaviare ', 'Calamar', 'El Retorno', 'Miraflores', 'Neiva',
                'Acevedo', 'Agrado', 'Aipe', 'Algeciras', 'Altamira', 'Baraya', 'Campoalegre', 'Colombia',
                'Elías', 'Garzón', 'Gigante', 'Guadalupe', 'Hobo', 'Íquira', 'Isnos', 'La Argentina',
                'La Plata', 'Nátaga', 'Oporapa', 'Paicol', 'Palermo', 'Palestina', 'Pital', 'Pitalito',
                'Rivera', 'Saladoblanco', 'San Agustín', 'Santa María', 'Suaza', 'Tarqui', 'Tello', 'Teruel',
                'Tesalia', 'Timaná', 'Villavieja', 'Yaguará', 'Riohacha', 'Albania', 'Barrancas', 'Dibulla',
                'Distracción', 'El Molino', 'Fonseca', 'Hatonuevo', 'La Jagua del Pilar', 'Maicao', 'Manaure',
                'San Juan del Cesar', 'Uribia', 'Urumita', 'Villanueva', 'Santa Marta', 'Algarrobo',
                'Aracataca', 'Ariguaní', 'Cerro de San Antonio', 'Chibolo', 'Ciénaga', 'Concordia', 'El Banco',
                'El Piñón', 'El Retén', 'Fundación', 'Guamal', 'Nueva Granada', 'Pedraza', 'Pijiño del Carmen',
                'Pivijay', 'Plato', 'Pueblo Viejo', 'Remolino', 'Sabanas de San Ángel', 'Salamina',
                'San Sebastián de Buenavista', 'San Zenón', 'Santa Ana', 'Santa Bárbara de Pinto', 'Sitionuevo',
                'Tenerife', 'Zapayán', 'Zona Bananera', 'Villavicencio', 'Acacías', 'Barranca de Upía',
                'Cabuyaro', 'Castilla La Nueva', 'Cubarral', 'Cumaral', 'El Calvario', 'El Castillo',
                'El Dorado', 'Fuente de Oro', 'Granada', 'Guamal', 'La Macarena', 'La Uribe', 'Lejanías',
                'Mapiripán', 'Mesetas', 'Puerto Concordia', 'Puerto Gaitán', 'Puerto Lleras', 'Puerto López',
                'Puerto Rico', 'Restrepo', 'San Carlos de Guaroa', 'SanJuan de Arama', 'San Juanito',
                'San Martín', 'Vista Hermosa', 'Pasto', 'Albán', 'Aldana', 'Ancuya', 'Arboleda', 'Barbacoas',
                'Belén', 'Buesaco', 'Chachagüí', 'Colón', 'Consacá', 'Contadero', 'Córdoba', 'Cuaspud',
                'Cumbal', 'Cumbitara', 'El Charco', 'El Peñol', 'El Rosario', 'El Tablón de Gómez', 'El Tambo',
                'Francisco Pizarro', 'Funes', 'Guachucal', 'Guaitarilla', 'Gualmatán', 'Iles', 'Imués',
                'Ipiales', 'La Cruz', 'La Florida', 'La Llanada', 'La Tola', 'La Unión', 'Leiva', 'Linares',
                'Los Andes', 'Magüí Payán', 'Mallama', 'Mosquera', 'Nariño', 'Olaya Herrera', 'Ospina',
                'Policarpa', 'Potosí', 'Providencia', 'Puerres', 'Pupiales', 'Ricaurte', 'Roberto Payán',
                'Samaniego', 'San Bernardo', 'San Lorenzo', 'San Pablo', 'San Pedro de Cartago', 'Sandoná',
                'Santa Bárbara', 'Santacruz', 'SapuyesTaminango', 'Tangua', 'Tumaco', 'Túquerres', 'Yacuanquer',
                'Cúcuta', 'Ábrego', 'Arboledas', 'Bochalema', 'Bucarasica', 'Cáchira', 'Cácota', 'Chinácota',
                'Chitagá', 'Convención', 'Cucutilla', 'Durania', 'El Carmen', 'El Tarra', 'El Zulia',
                'Gramalote', 'Hacarí', 'Herrán', 'La Esperanza', 'La Playa de Belén', 'Labateca', 'Los Patios',
                'Lourdes', 'Mutiscua', 'Ocaña', 'Pamplona', 'Pamplonita', 'Puerto Santander', 'Ragonvalia',
                'Salazar de Las Palmas', 'San Calixto', 'San Cayetano', 'Santiago', 'Santo Domingo de Silos',
                'Sardinata', 'Teorama', 'Tibú', 'Toledo', 'Villa Caro', 'Villa del Rosario', 'Mocoa', 'Colón',
                'Orito', 'Puerto Asís', 'Puerto Caicedo', 'Puerto Guzmán', 'Puerto Leguízamo', 'San Francisco',
                'San Miguel', 'Santiago', 'Sibundoy', 'Valle del Guamuez', 'Villagarzón', 'Armenia',
                'Buenavista', 'Calarcá', 'Circasia', 'Córdoba', 'Filandia', 'Génova', 'La Tebaida',
                'Montenegro', 'Pijao', 'Quimbaya', 'Salento', 'Pereira', 'Apía', 'Balboa', 'Belén de Umbría',
                'Dosquebradas', 'Guática', 'La Celia', 'La Virginia', 'Marsella', 'Mistrató', 'Pueblo Rico',
                'Quinchía', 'Santa Rosa de Cabal', 'Santuario', 'San Andres Isla', 'Providencia',
                'Santa Catalina', 'Bucaramanga', 'Aguada', 'Albania', 'Aratoca', 'Barbosa', 'Barichara',
                'Barrancabermeja', 'Betulia', 'Bolívar', 'Cabrera', 'California', 'Capitanejo', 'Carcasí',
                'Cepitá', 'Cerrito', 'Charalá', 'Charta', 'Chima', 'Chipatá', 'Cimitarra', 'Concepción',
                'Confines', 'Contratación', 'Coromoro', 'Curití', 'El Carmen de Chucurí', 'El Guacamayo',
                'El Peñón', 'El Playón', 'Encino', 'Enciso', 'Florián', 'Floridablanca', 'Galán', 'Gámbita',
                'Girón', 'Guaca', 'Guadalupe', 'Guapotá', 'Guavatá', 'Güepsa', 'Hato', 'Jesús María', 'Jordán',
                'La Belleza', 'La Paz', 'Landázuri', 'Lebrija', 'Los Santos', 'Macaravita', 'Málaga', 'Matanza',
                'Mogotes', 'Molagavita', 'Ocamonte', 'Oiba', 'Onzaga', 'Palmar', 'Palmas del Socorro', 'Páramo',
                'Piedecuesta', 'Pinchote', 'Puente Nacional', 'Puerto Parra', 'Puerto Wilches', 'Rionegro',
                'Sabana de Torres', 'San Andrés', 'San Benito', 'San Gil', 'San Joaquín', 'San José de Miranda',
                'San Miguel', 'San Vicente de Chucurí', 'Santa Bárbara', 'Santa Helena del Opón', 'Simacota',
                'Socorro', 'Suaita', 'Sucre', 'Suratá', 'Tona', 'Valle de San José', 'Vélez', 'Vetas',
                'Villanueva', 'Zapatoca', 'Sincelejo', 'Buenavista', 'Caimito', 'Chalán', 'Colosó', 'Corozal',
                'Coveñas', 'El Roble', 'Galeras', 'Guaranda', 'La Unión', 'Los Palmitos', 'Majagual', 'Morroa',
                'Ovejas', 'Palmito', 'Sampués', 'San Benito Abad', 'San Juan de Betulia', 'San Marcos',
                'San Onofre', 'San Pedro', 'Santiago de Tolú', 'Sincé', 'Sucre', 'Toluviejo', 'Ibagué',
                'Alpujarra', 'Alvarado', 'Ambalema', 'Anzoátegui', 'Armero', 'Ataco', 'Cajamarca',
                'Carmen de Apicalá', 'Casabianca', 'Chaparral', 'Coello', 'Coyaima', 'Cunday', 'Dolores',
                'Espinal', 'Falan', 'Flandes', 'Fresno', 'Guamo', 'Herveo', 'Honda ', 'Icononzo', 'Lérida',
                'Líbano', 'Melgar', 'Murillo', 'Natagaima', 'Ortega', 'Palocabildo', 'Piedras', 'Planadas',
                'Prado', 'Purificación', 'Rioblanco', 'Roncesvalles', 'Rovira', 'Saldaña', 'San Antonio',
                'San Luis', 'San Sebastián de Mariquita', 'Santa Isabel', 'Suárez', 'Valle de San Juan',
                'Venadillo', 'Villahermosa', 'Villarrica', 'Cali', 'Alcalá', 'Andalucía', 'Ansermanuevo',
                'Argelia', 'Bolívar', 'Buenaventura', 'Buga', 'Bugalagrande', 'Caicedonia', 'Calima El Darién',
                'Candelaria', 'Cartago', 'Dagua', 'El Águila', 'El Cairo', ' El Cerrito', 'El Dovio', 'Florida',
                'Ginebra', 'Guacarí', 'Jamundí', 'La Cumbre', 'La Unión', 'La Victoria', 'Obando', 'Palmira',
                'Pradera', 'Restrepo', 'Riofrío', 'Roldanillo', 'San Pedro', 'Sevilla', 'Toro', 'Trujillo',
                'Tuluá', 'Ulloa', 'Versalles', 'Vijes', 'Yotoco', 'Yumbo', 'Zarzal', 'Mitú', 'Carurú', 'Pacoa',
                'Papunaua', 'Taraira', 'Yavaraté', 'Puerto Carreño', 'Cumaribo', 'La Primavera', 'Santa Rosalía'
            ];

            // Función para mostrar lugares en OUT
            function mostrarLugaresOUT(arreglo, lugar) {
                let elementos = '<option value="">Seleccione</option>';
                for (let i = 0; i < arreglo.length; i++) {
                    elementos += '<option value="' + arreglo[i] + '">' + arreglo[i] + '</option>';
                }
                lugar.innerHTML = elementos;
            }

            // Función para recortar array en OUT
            function recortarOUT(array, inicio, fin, lugar) {
                let recortar = array.slice(inicio, fin);
                mostrarLugaresOUT(recortar, lugar);
            }

            // Inicializar departamentos para OUT cuando se carga la página o se selecciona OUT
            function inicializarDepartamentosOUT() {
                if ($departamentoOUT) {
                    mostrarLugaresOUT(departamentosOUT, $departamentoOUT);
                    console.log('Departamentos OUT inicializados');
                }
            }

            // Event listener para cuando cambie el departamento en OUT
            if ($departamentoOUT && $ciudadOUT) {
                $departamentoOUT.addEventListener('change', function() {
                    let valor = $departamentoOUT.value;
                    console.log('Departamento OUT seleccionado:', valor);

                    // Limpiar ciudades
                    $ciudadOUT.innerHTML = '<option value="">Ciudad</option>';

                    switch (valor) {
                        case 'Amazonas':
                            recortarOUT(ciudadesOUT, 0, 10, $ciudadOUT);
                            break;
                        case 'Antioquia':
                            recortarOUT(ciudadesOUT, 10, 135, $ciudadOUT);
                            break;
                        case 'Arauca':
                            recortarOUT(ciudadesOUT, 135, 142, $ciudadOUT);
                            break;
                        case 'Atlántico':
                            recortarOUT(ciudadesOUT, 142, 165, $ciudadOUT);
                            break;
                        case 'Bolívar':
                            recortarOUT(ciudadesOUT, 165, 211, $ciudadOUT);
                            break;
                        case 'Boyacá':
                            recortarOUT(ciudadesOUT, 211, 335, $ciudadOUT);
                            break;
                        case 'Caldas':
                            recortarOUT(ciudadesOUT, 335, 362, $ciudadOUT);
                            break;
                        case 'Caquetá':
                            recortarOUT(ciudadesOUT, 362, 378, $ciudadOUT);
                            break;
                        case 'Casanare':
                            recortarOUT(ciudadesOUT, 378, 397, $ciudadOUT);
                            break;
                        case 'Cauca':
                            recortarOUT(ciudadesOUT, 397, 439, $ciudadOUT);
                            break;
                        case 'Cesar':
                            recortarOUT(ciudadesOUT, 439, 464, $ciudadOUT);
                            break;
                        case 'Chocó':
                            recortarOUT(ciudadesOUT, 464, 494, $ciudadOUT);
                            break;
                        case 'Córdoba':
                            recortarOUT(ciudadesOUT, 494, 524, $ciudadOUT);
                            break;
                        case 'Cundinamarca':
                            recortarOUT(ciudadesOUT, 524, 640, $ciudadOUT);
                            break;
                        case 'Guainía':
                            recortarOUT(ciudadesOUT, 640, 648, $ciudadOUT);
                            break;
                        case 'Guaviare':
                            recortarOUT(ciudadesOUT, 648, 652, $ciudadOUT);
                            break;
                        case 'Huila':
                            recortarOUT(ciudadesOUT, 652, 689, $ciudadOUT);
                            break;
                        case 'La Guajira':
                            recortarOUT(ciudadesOUT, 689, 704, $ciudadOUT);
                            break;
                        case 'Magdalena':
                            recortarOUT(ciudadesOUT, 704, 734, $ciudadOUT);
                            break;
                        case 'Meta':
                            recortarOUT(ciudadesOUT, 734, 763, $ciudadOUT);
                            break;
                        case 'Nariño':
                            recortarOUT(ciudadesOUT, 763, 826, $ciudadOUT);
                            break;
                        case 'Norte de Santander':
                            recortarOUT(ciudadesOUT, 826, 866, $ciudadOUT);
                            break;
                        case 'Putumayo':
                            recortarOUT(ciudadesOUT, 866, 879, $ciudadOUT);
                            break;
                        case 'Quindío':
                            recortarOUT(ciudadesOUT, 879, 891, $ciudadOUT);
                            break;
                        case 'Risaralda':
                            recortarOUT(ciudadesOUT, 891, 905, $ciudadOUT);
                            break;
                        case 'San Andrés y Providencia':
                            recortarOUT(ciudadesOUT, 905, 908, $ciudadOUT);
                            break;
                        case 'Santander':
                            recortarOUT(ciudadesOUT, 908, 995, $ciudadOUT);
                            break;
                        case 'Sucre':
                            recortarOUT(ciudadesOUT, 995, 1021, $ciudadOUT);
                            break;
                        case 'Tolima':
                            recortarOUT(ciudadesOUT, 1021, 1068, $ciudadOUT);
                            break;
                        case 'Valle del Cauca':
                            recortarOUT(ciudadesOUT, 1068, 1110, $ciudadOUT);
                            break;
                        case 'Vaupés':
                            recortarOUT(ciudadesOUT, 1110, 1116, $ciudadOUT);
                            break;
                        case 'Vichada':
                            recortarOUT(ciudadesOUT, 1116, 1120, $ciudadOUT);
                            break;
                    }
                });
            }

            // Llamar a la inicialización cuando se selecciona OUT
            const tipoLlamadaSelect = document.getElementById('tipoLlamadaRescate');
            if (tipoLlamadaSelect) {
                tipoLlamadaSelect.addEventListener('change', function() {
                    if (this.value === 'OUT') {
                        // Esperar un poco para que el DOM se actualice
                        setTimeout(() => {
                            inicializarDepartamentosOUT();
                        }, 100);
                    }
                });
            }

            // También inicializar si ya está en modo OUT
            setTimeout(() => {
                if (tipoLlamadaSelect && tipoLlamadaSelect.value === 'OUT') {
                    inicializarDepartamentosOUT();
                }
            }, 200);
        });
    </script>
@endsection
