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
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="motivo_fuerza_mayor">
                            <div class="form-group">
                                <select name="motivoFuerzaMayor" class="custom-select">
                                    <option value="">MOTIVO FUERZA MAYOR</option>
                                    <option value="VIA CERRADA">VIA CERRADA</option>
                                    <option value="FUERTE LLUVIAS">FUERTE LLUVIAS</option>
                                    <option value="PAROS">PAROS</option>
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
                                <label for="valorEquipo">VALOR DE EQUIPO</label>
                                <input type="text" class="form-control" name="valorEquipo" id="valorEquipo" placeholder="Ingrese el valor del equipo">
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

    tipoNovedadSelect.addEventListener('change', function() {
        if (this.value === 'FUERZA MAYOR') {
            motivoFuerzaMayorDiv.style.display = 'block';
        } else {
            motivoFuerzaMayorDiv.style.display = 'none';
        }
    });

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
                tipoEspecificoSelect.style.display = 'none';
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
