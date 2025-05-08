@extends('layouts.main', ['activePage' => 'altoriesgo', 'titlePage' => 'Alto Riesgo'])
@section('content')
<!-- etiqueta del foreach -->
        @foreach ($colombia as $colombia)
        @php
        $arraydep = $colombia->departamento;
        $arrayciud = $colombia->ciudades;
        @endphp
        @endforeach 

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content" style="color:black;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">BUSCAR ZONA DE ALTO RIESGO</h3>
                    </center>
                    <div class="card">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <center>
                            
                         @can('zonariesgo_import')
                         <a href="/altoriesgoimport" style="width: 25%" class="btn btn-info">IMPORTAR DATOS</a> 
                         @endcan
                           
                        </center>

                        <center>
                            <div id="valueInput"
                                style="background-color: rgb(86, 192, 44);color:black; width:25%;border-radius:15px">
                            </div>
                        </center>
                        <form style="margin: 10px" action="/buscador" method="POST">
                            @csrf
                            @method('GET')
                            <div class="row">
                                <div class="col">
                                    <label for="">DEPARTAMENTO</label>
                                    <select name="departamento" id="Tipificacion_detalle_1" class="form-control" style="border-radius: 10px">
                                    </section>
                                </div>
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>
                                <div class="col">
                                    <label for="">CIUDAD</label>
                                    <select name="ciudad" id="Tipificacion_detalle_2" class="form-control" style="border-radius: 10px">
                                    </section>
                                </div>
                                <div class="form-group col-md-6">
                                    <input hidden>
                                </div>
                                <div class="col">
                                    <label for="direccion" class="form-label">Barrio</label>
                                    <input class="form-control" style="border-radius: 10px;border-color:black"
                                        style="border-radius: 10px;border-color:black" type="text" name="direccion"
                                        aria-label="">
                                </div>
                               
                            <div style="display: flex;align-items: center;justify-content: center;margin-top:10px;">
                                class="col-12">
                                <input type="submit" class="btn btn-info" value="Buscar"
                                    style="background-color: #42a1b4">
                            </div>
                        </form> 
                        <center>
                            {{--
                            <button type="button" class="btn btn-info" onclick="getValueInput()">
                                Obtener direccion
                            </button>
                            --}}
                        </center>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div>
                            <div class="table-responsive">
                              @if (isset($coberturas) or isset($coberturanulo))
                                @if ($coberturanulo != 'nulo')
                                    
                                <table class="table" >
                                    <thead style="background-color: #3db0c7; color:white;">
                                        <th style="border: 1px solid black"><h1>Regional</h1></th>
                                        <th style="border: 1px solid black"><h1>Ciudad/Municipio</h1></th>
                                        <th style="border: 1px solid black"><h1>Barrio</h1></th>
                                        <th style="border: 1px solid black"><h1>Tiempo de entrega alistamiento</h1></th>
                                        <th style="border: 1px solid black"><h1>Alto riesgo</h1></th>
                                        <th style="border: 1px solid black"><h1>Horarios De lunes a lunes-viernes</h1></th>
                                        <th style="border: 1px solid black"><h1>Nombre del punto</h1></th>
                                        <th style="border: 1px solid black"><h1>Direccion</h1></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($coberturas as $cobertura)
                                        <tr>
                                            <td>{{ $cobertura->regional }}</td>
                                            <td>{{ $cobertura->ciudad }}</td>
                                            <td>{{ $cobertura->barrio }}</td>
                                            <td>{{ $cobertura->tiempoentrega_alistamiento }}</td>
                                            <td>{{ $cobertura->observacion }}</td>
                                            <td>{{ $cobertura->h_lunes_viernes }}</td>
                                            <td>{{ $cobertura->nombre_punto }}</td>
                                            <td>{{ $cobertura->direccion}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <table class="table">
                                    <thead style="background-color: #3db0c7; color:white;  text-align: center;">
                                        <th style="border: 1px solid black"><h1>ERROR DE BUSQUEDA</h1></th>
                                    </thead>
                                    <tbody class="text-center">
                                        <tr>
                                            <td>No se encontraron resultados de su busqueda</td>
                                    </tbody>
                                </table>
                              @endif
                            </div>
                        </div>
                        <div class="card-footer mr-auto">
                            {{ $coberturas->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- CIUDAD DEPART Conexion BD --}}

    <script type="text/javascript">

        //codigo de javascripttipi.html
        let $Tipificacion_detalle_1 = document.getElementById('Tipificacion_detalle_1')
            let $Tipificacion_detalle_2 = document.getElementById('Tipificacion_detalle_2')
        
            /* pasar de string a array */
            var arraydep = @json($arraydep); 
            let tp1 = arraydep.split(',')
            var arrayciud = @json($arrayciud); 
            let tp2 = arrayciud.split(',')

            //mostrar funcones por pantralla
            function mostrarLugares(arreglo, lugar) {
                let elementos = '<option selected disables>Seleccione</option>'
        
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
        
            $Tipificacion_detalle_1.addEventListener('change', function () {
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
                        recortar(tp2, 362, 377, $Tipificacion_detalle_2)
                        break
                    case 'Casanare':
                        recortar(tp2, 377, 396, $Tipificacion_detalle_2)
                        break
                    case 'Cauca':
                        recortar(tp2, 396, 438, $Tipificacion_detalle_2)
                        break
                    case 'Cesar':
                        recortar(tp2, 438, 463, $Tipificacion_detalle_2)
                        break
                    case 'Chocó':
                        recortar(tp2, 463, 493, $Tipificacion_detalle_2)
                        break
                    case 'Córdoba':
                        recortar(tp2, 493, 523, $Tipificacion_detalle_2)
                        break
                    case 'Cundinamarca':
                        recortar(tp2, 523, 639, $Tipificacion_detalle_2)
                        break
                    case 'Guainía':
                        recortar(tp2, 639, 647, $Tipificacion_detalle_2)
                        break
                    case 'Guaviare':
                        recortar(tp2, 647, 651, $Tipificacion_detalle_2)
                        break  
                    case 'Huila':
                        recortar(tp2, 651, 688, $Tipificacion_detalle_2)
                        break 
                    case 'La Guajira':
                        recortar(tp2, 688, 703, $Tipificacion_detalle_2)
                        break    
                    case 'Magdalena':
                        recortar(tp2, 703, 733, $Tipificacion_detalle_2)
                        break   
                    case 'Meta':
                        recortar(tp2, 733, 762, $Tipificacion_detalle_2)
                        break 
                    case 'Nariño':
                        recortar(tp2, 762, 825, $Tipificacion_detalle_2)
                        break 
                    case 'Norte de Santander':
                        recortar(tp2, 825, 865, $Tipificacion_detalle_2)
                        break 
                    case 'Putumayo':
                        recortar(tp2, 865, 878, $Tipificacion_detalle_2)
                        break 
                    case 'Quindío':
                        recortar(tp2, 878, 890, $Tipificacion_detalle_2)
                        break 
                    case 'Risaralda':
                        recortar(tp2, 890, 904, $Tipificacion_detalle_2)
                        break 
                    case 'San Andrés y Providencia':
                        recortar(tp2, 904, 907, $Tipificacion_detalle_2)
                        break 
                    case 'Santander':
                        recortar(tp2, 907, 994, $Tipificacion_detalle_2)
                        break 
                    case 'Sucre':
                        recortar(tp2, 994, 1020, $Tipificacion_detalle_2)
                        break 
                    case 'Tolima':
                        recortar(tp2, 1020, 1067, $Tipificacion_detalle_2)
                        break 
                    case 'Valle del Cauca':
                        recortar(tp2, 1067, 1109, $Tipificacion_detalle_2)
                        break 
                    case 'Vaupés':
                        recortar(tp2, 1109, 1115, $Tipificacion_detalle_2)
                        break 
                    case 'Vichada':
                        recortar(tp2, 1115, 1119, $Tipificacion_detalle_2)
                        break 
                }
        
        
            })
              </script>


@endsection