@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => 'Bienvenido'])
@section('content')
    <h1 style="margin-top: 50px; margin-left:48px;">{{ Auth::user()->username }} </h1>
    <h6 style="margin-top: 10px;margin-left:48px;">Ultima Conexión: {{ Auth::user()->last_login }} </h6>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- SELECION DE FECHA PARA EL DASHBOARD --}}
                            <div>
                                <form action="/home">
                                    <label for="">Selecione el mes a conocer</label>
                                    <select name="mes" id="mes" onChange="selecionmes()">
                                        <option value="">Selecione la fecha</option>
                                        <option value="enero">Enero</option>
                                        <option value="febrero">Febrero</option>
                                        <option value="marzo">Marzo</option>
                                        <option value="abril">Abril</option>
                                        <option value="mayo">Mayo</option>
                                        <option value="junio">Junio</option>
                                        <option value="julio">Julio</option>
                                        <option value="agosto">Agosto</option>
                                        <option value="septiembre">Septiembre</option>
                                        <option value="octubre">Octubre</option>
                                        <option value="noviembre">Noviembre</option>
                                        <option value="diciembre">Diciembre</option>
                                    </select>
                                    <input type="submit" id="butonmes" hidden>
                                    <script>
                                        function selecionmes() {
                                            const mes = document.getElementById('mes').value
                                            $("#butonmes").click();

                                        }
                                    </script>
                                </form>
                            </div>
                            <div class="row">
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"
                                    integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A=="
                                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                {{-- INICO DASH POR DIA --}}

                                {{-- INICIO PORTABILIDAD INBOUND --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">PORTABILIDAD INBOUND</h5>
                                            <div style="height:276px">
                                                <div>
                                                    <canvas id="PORTABILIDAD INBOUND"></canvas>
                                                    <table class="table">
                                                        <thead>

                                                        </thead>
                                                        <tbody style="text-align: center" hidden>
                                                            @foreach ($portinb1 as $por1)
                                                                <td>
                                                                    {{ $por1 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb2 as $por2)
                                                                <td>
                                                                    {{ $por2 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb3 as $por3)
                                                                <td>
                                                                    {{ $por3 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb4 as $por4)
                                                                <td>
                                                                    {{ $por4 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb5 as $por5)
                                                                <td>
                                                                    {{ $por5 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb6 as $por6)
                                                                <td>
                                                                    {{ $por6 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb7 as $por7)
                                                                <td>
                                                                    {{ $por7 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb8 as $por8)
                                                                <td>
                                                                    {{ $por8 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb9 as $por9)
                                                                <td>
                                                                    {{ $por9 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb10 as $por10)
                                                                <td>
                                                                    {{ $por10 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb11 as $por11)
                                                                <td>
                                                                    {{ $por11 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb12 as $por12)
                                                                <td>
                                                                    {{ $por12 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb13 as $por13)
                                                                <td>
                                                                    {{ $por13 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb14 as $por14)
                                                                <td>
                                                                    {{ $por14 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb15 as $por15)
                                                                <td>
                                                                    {{ $por15 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb16 as $por16)
                                                                <td>
                                                                    {{ $por16 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb17 as $por17)
                                                                <td>
                                                                    {{ $por17 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb18 as $por18)
                                                                <td>
                                                                    {{ $por18 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb19 as $por19)
                                                                <td>
                                                                    {{ $por19 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb20 as $por20)
                                                                <td>
                                                                    {{ $por20 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb21 as $por21)
                                                                <td>
                                                                    {{ $por21 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb22 as $por22)
                                                                <td>
                                                                    {{ $por22 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb23 as $por23)
                                                                <td>
                                                                    {{ $por23 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb24 as $por24)
                                                                <td>
                                                                    {{ $por24 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb25 as $por25)
                                                                <td>
                                                                    {{ $por25 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb26 as $por26)
                                                                <td>
                                                                    {{ $por26 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb27 as $por27)
                                                                <td>
                                                                    {{ $por27 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb28 as $por28)
                                                                <td>
                                                                    {{ $por28 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb29 as $por29)
                                                                <td>
                                                                    {{ $por29 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb30 as $por30)
                                                                <td>
                                                                    {{ $por30 }}
                                                                </td>
                                                            @endforeach
                                                            @foreach ($portinb31 as $por31)
                                                                <td>
                                                                    {{ $por31 }}
                                                                </td>
                                                            @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>

                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];

                                                    const data = {
                                                        labels: labels,
                                                        datasets: [{
                                                            label: '',
                                                            data: [{{ $por1 }}, {{ $por2 }}, {{ $por3 }}, {{ $por4 }},
                                                                {{ $por5 }}, {{ $por6 }}, {{ $por7 }}, {{ $por8 }},
                                                                {{ $por9 }}, {{ $por10 }}, {{ $por11 }}, {{ $por12 }},
                                                                {{ $por13 }}, {{ $por14 }}, {{ $por15 }}, {{ $por16 }},
                                                                {{ $por17 }}, {{ $por18 }}, {{ $por19 }}, {{ $por20 }},
                                                                {{ $por21 }}, {{ $por22 }}, {{ $por23 }}, {{ $por24 }},
                                                                {{ $por25 }}, {{ $por26 }}, {{ $por27 }}, {{ $por28 }},
                                                                {{ $por29 }}, {{ $por30 }}, {{ $por31 }},
                                                            ],
                                                            backgroundColor: [
                                                                'rgba(255, 87, 87, 0.5)',
                                                                'rgba(255, 198, 87, 0.7)',
                                                                'rgba(87, 255, 87, 0.6)',
                                                                'rgba(87, 178, 255, 0.5)',
                                                                'rgba(255, 87, 183, 0.5)',
                                                                'rgba(87, 250, 255, 0.7)',
                                                                'rgba(87, 255, 129, 0.6)',
                                                                'rgba(87, 178, 255, 0.5)',
                                                                'rgba(162, 87, 255, 0.5)',
                                                                'rgba(87, 144, 255, 0.6)',
                                                                'rgba(255, 255, 87, 0.6)',
                                                                'rgba(87, 255, 95, 0.7)',
                                                                'rgba(158, 247, 125, 0.6)',
                                                                'rgba(255, 139, 87, 0.5)',
                                                                'rgba(158, 247, 125, 0.7)',
                                                                'rgba(255, 236, 53, 0.5)',
                                                                'rgba(255, 168, 53, 0.5)',
                                                                'rgba(255, 244, 111, 0.5)',
                                                                'rgba(56, 53, 255, 0.6)',
                                                                'rgba(255, 184, 111, 0.7)',
                                                                'rgba(140, 255, 53, 0.5)',
                                                                'rgba(247, 201, 125, 0.7)',
                                                                'rgba(255, 168, 53, 0.5)',
                                                                'rgba(114, 111, 255, 0.7)',
                                                                'rgba(128, 255, 53, 0.5)',
                                                                'rgba(53, 255, 190, 0.6)',
                                                                'rgba(125, 247, 207, 0.7)',
                                                                'rgba(213, 247, 125, 0.7)',
                                                                'rgba(202, 111, 255, 0.7)',
                                                                'rgba(125, 183, 247, 0.5)',
                                                                'rgba(255, 175, 242, 0.6)',
                                                            ],
                                                            borderColor: [

                                                            ],
                                                            borderWidth: 0
                                                        }]
                                                    };

                                                    const config = {
                                                        type: 'bar',
                                                        data: data,
                                                        plugins: [ChartDataLabels],
                                                        options: {
                                                            scales: {
                                                                xAxes: [{
                                                                    barPercentage: 1.1,
                                                                }]
                                                            },
                                                            plugins: {
                                                                legend: {
                                                                    display: true
                                                                },
                                                                datalabels: {
                                                                    display: function(context) {
                                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                                    },
                                                                    color: 'black',
                                                                    anchor: 'end',
                                                                    align: 'end',
                                                                    rotation: -45,
                                                                    padding: {
                                                                        top: -30
                                                                    },
                                                                    font: {
                                                                        size: 12,
                                                                    }
                                                                }
                                                            },
                                                            scales: {
                                                                y: {
                                                                    beginAtZero: true
                                                                }
                                                            }
                                                        }
                                                    };
                                                </script>

                                                <script>
                                                    const myChart = new Chart(
                                                        document.getElementById('PORTABILIDAD INBOUND'),
                                                        config
                                                    );
                                                </script>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN PORTABILIDAD INBOUND --}}

                                {{-- INICIO PORTABILIDAD DIGITAL --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">PORTABILIDAD DIGITAL</h5>
                                            <div style="height:276px">
                                                <canvas id="PORTABILIDAD DIGITAL"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($portdig1 as $portdigs1)
                                                            <td>
                                                                {{ $portdigs1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig2 as $portdigs2)
                                                            <td>
                                                                {{ $portdigs2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig3 as $portdigs3)
                                                            <td>
                                                                {{ $portdigs3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig4 as $portdigs4)
                                                            <td>
                                                                {{ $portdigs4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig5 as $portdigs5)
                                                            <td>
                                                                {{ $portdigs5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig6 as $portdigs6)
                                                            <td>
                                                                {{ $portdigs6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig7 as $portdigs7)
                                                            <td>
                                                                {{ $portdigs7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig8 as $portdigs8)
                                                            <td>
                                                                {{ $portdigs8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig9 as $portdigs9)
                                                            <td>
                                                                {{ $portdigs9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig10 as $portdigs10)
                                                            <td>
                                                                {{ $portdigs10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig11 as $portdigs11)
                                                            <td>
                                                                {{ $portdigs11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig12 as $portdigs12)
                                                            <td>
                                                                {{ $portdigs12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig13 as $portdigs13)
                                                            <td>
                                                                {{ $portdigs13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig14 as $portdigs14)
                                                            <td>
                                                                {{ $portdigs14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig15 as $portdigs15)
                                                            <td>
                                                                {{ $portdigs15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig16 as $portdigs16)
                                                            <td>
                                                                {{ $portdigs16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig17 as $portdigs17)
                                                            <td>
                                                                {{ $portdigs17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig18 as $portdigs18)
                                                            <td>
                                                                {{ $portdigs18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig19 as $portdigs19)
                                                            <td>
                                                                {{ $portdigs19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig20 as $portdigs20)
                                                            <td>
                                                                {{ $portdigs20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig21 as $portdigs21)
                                                            <td>
                                                                {{ $portdigs21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig22 as $portdigs22)
                                                            <td>
                                                                {{ $portdigs22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig23 as $portdigs23)
                                                            <td>
                                                                {{ $portdigs23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig24 as $portdigs24)
                                                            <td>
                                                                {{ $portdigs24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig25 as $portdigs25)
                                                            <td>
                                                                {{ $portdigs25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig26 as $portdigs26)
                                                            <td>
                                                                {{ $portdigs26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig27 as $portdigs27)
                                                            <td>
                                                                {{ $portdigs27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig28 as $portdigs28)
                                                            <td>
                                                                {{ $portdigs28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig29 as $portdigs29)
                                                            <td>
                                                                {{ $portdigs29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig30 as $portdigs30)
                                                            <td>
                                                                {{ $portdigs30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portdig31 as $portdigs31)
                                                            <td>
                                                                {{ $portdigs31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('PORTABILIDAD DIGITAL').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $portdigs1 }}, {{ $portdigs2 }}, {{ $portdigs3 }},
                                                    {{ $portdigs4 }}, {{ $portdigs5 }}, {{ $portdigs6 }},
                                                    {{ $portdigs7 }}, {{ $portdigs8 }}, {{ $portdigs9 }},
                                                    {{ $portdigs10 }}, {{ $portdigs11 }}, {{ $portdigs12 }},
                                                    {{ $portdigs13 }}, {{ $portdigs14 }}, {{ $portdigs15 }},
                                                    {{ $portdigs16 }}, {{ $portdigs17 }}, {{ $portdigs18 }},
                                                    {{ $portdigs19 }}, {{ $portdigs20 }}, {{ $portdigs21 }},
                                                    {{ $portdigs22 }}, {{ $portdigs23 }}, {{ $portdigs24 }},
                                                    {{ $portdigs25 }}, {{ $portdigs26 }}, {{ $portdigs27 }},
                                                    {{ $portdigs28 }}, {{ $portdigs29 }}, {{ $portdigs30 }},
                                                    {{ $portdigs31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN PORTABILIDAD DIGITAL --}}

                                {{-- INICIO PORTABILIDAD TELEVENTA --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">PORTABILIDAD TELEVENTA</h5>
                                            <div style="height:276px">
                                                <canvas id="PORTABILIDAD TELEVENTA"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($portele1 as $portelev1)
                                                            <td>
                                                                {{ $portelev1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele2 as $portelev2)
                                                            <td>
                                                                {{ $portelev2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele3 as $portelev3)
                                                            <td>
                                                                {{ $portelev3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele4 as $portelev4)
                                                            <td>
                                                                {{ $portelev4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele5 as $portelev5)
                                                            <td>
                                                                {{ $portelev5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele6 as $portelev6)
                                                            <td>
                                                                {{ $portelev6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele7 as $portelev7)
                                                            <td>
                                                                {{ $portelev7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele8 as $portelev8)
                                                            <td>
                                                                {{ $portelev8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele9 as $portelev9)
                                                            <td>
                                                                {{ $portelev9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele10 as $portelev10)
                                                            <td>
                                                                {{ $portelev10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele11 as $portelev11)
                                                            <td>
                                                                {{ $portelev11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele12 as $portelev12)
                                                            <td>
                                                                {{ $portelev12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele13 as $portelev13)
                                                            <td>
                                                                {{ $portelev13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele14 as $portelev14)
                                                            <td>
                                                                {{ $portelev14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele15 as $portelev15)
                                                            <td>
                                                                {{ $portelev15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele16 as $portelev16)
                                                            <td>
                                                                {{ $portelev16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele17 as $portelev17)
                                                            <td>
                                                                {{ $portelev17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele18 as $portelev18)
                                                            <td>
                                                                {{ $portelev18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele19 as $portelev19)
                                                            <td>
                                                                {{ $portelev19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele20 as $portelev20)
                                                            <td>
                                                                {{ $portelev20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele21 as $portelev21)
                                                            <td>
                                                                {{ $portelev21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele22 as $portelev22)
                                                            <td>
                                                                {{ $portelev22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele23 as $portelev23)
                                                            <td>
                                                                {{ $portelev23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele24 as $portelev24)
                                                            <td>
                                                                {{ $portelev24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele25 as $portelev25)
                                                            <td>
                                                                {{ $portelev25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele26 as $portelev26)
                                                            <td>
                                                                {{ $portelev26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele27 as $portelev27)
                                                            <td>
                                                                {{ $portelev27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele28 as $portelev28)
                                                            <td>
                                                                {{ $portelev28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele29 as $portelev29)
                                                            <td>
                                                                {{ $portelev29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele30 as $portelev30)
                                                            <td>
                                                                {{ $portelev30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portele31 as $portelev31)
                                                            <td>
                                                                {{ $portelev31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('PORTABILIDAD TELEVENTA').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $portelev1 }}, {{ $portelev2 }}, {{ $portelev3 }},
                                                    {{ $portelev4 }}, {{ $portelev5 }}, {{ $portelev6 }},
                                                    {{ $portelev7 }}, {{ $portelev8 }}, {{ $portelev9 }},
                                                    {{ $portelev10 }}, {{ $portelev11 }}, {{ $portelev12 }},
                                                    {{ $portelev13 }}, {{ $portelev14 }}, {{ $portelev15 }},
                                                    {{ $portelev16 }}, {{ $portelev17 }}, {{ $portelev18 }},
                                                    {{ $portelev19 }}, {{ $portelev20 }}, {{ $portelev21 }},
                                                    {{ $portelev22 }}, {{ $portelev23 }}, {{ $portelev24 }},
                                                    {{ $portelev25 }}, {{ $portelev26 }}, {{ $portelev27 }},
                                                    {{ $portelev28 }}, {{ $portelev29 }}, {{ $portelev30 }},
                                                    {{ $portelev31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN PORTABILIDAD TELEVENTA --}}

                                {{-- INICIO UP GRADE INBOUND --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">UP GRADE INBOUND</h5>
                                            <div style="height:276px">
                                                <canvas id="UP GRADE INBOUND"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($upginb1 as $upginbs1)
                                                            <td>
                                                                {{ $upginbs1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb2 as $upginbs2)
                                                            <td>
                                                                {{ $upginbs2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb3 as $upginbs3)
                                                            <td>
                                                                {{ $upginbs3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb4 as $upginbs4)
                                                            <td>
                                                                {{ $upginbs4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb5 as $upginbs5)
                                                            <td>
                                                                {{ $upginbs5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb6 as $upginbs6)
                                                            <td>
                                                                {{ $upginbs6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb7 as $upginbs7)
                                                            <td>
                                                                {{ $upginbs7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb8 as $upginbs8)
                                                            <td>
                                                                {{ $upginbs8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb9 as $upginbs9)
                                                            <td>
                                                                {{ $upginbs9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb10 as $upginbs10)
                                                            <td>
                                                                {{ $upginbs10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb11 as $upginbs11)
                                                            <td>
                                                                {{ $upginbs11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb12 as $upginbs12)
                                                            <td>
                                                                {{ $upginbs12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb13 as $upginbs13)
                                                            <td>
                                                                {{ $upginbs13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb14 as $upginbs14)
                                                            <td>
                                                                {{ $upginbs14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb15 as $upginbs15)
                                                            <td>
                                                                {{ $upginbs15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb16 as $upginbs16)
                                                            <td>
                                                                {{ $upginbs16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb17 as $upginbs17)
                                                            <td>
                                                                {{ $upginbs17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb18 as $upginbs18)
                                                            <td>
                                                                {{ $upginbs18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb19 as $upginbs19)
                                                            <td>
                                                                {{ $upginbs19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb20 as $upginbs20)
                                                            <td>
                                                                {{ $upginbs20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb21 as $upginbs21)
                                                            <td>
                                                                {{ $upginbs21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb22 as $upginbs22)
                                                            <td>
                                                                {{ $upginbs22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb23 as $upginbs23)
                                                            <td>
                                                                {{ $upginbs23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb24 as $upginbs24)
                                                            <td>
                                                                {{ $upginbs24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb25 as $upginbs25)
                                                            <td>
                                                                {{ $upginbs25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb26 as $upginbs26)
                                                            <td>
                                                                {{ $upginbs26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb27 as $upginbs27)
                                                            <td>
                                                                {{ $upginbs27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb28 as $upginbs28)
                                                            <td>
                                                                {{ $upginbs28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb29 as $upginbs29)
                                                            <td>
                                                                {{ $upginbs29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb30 as $upginbs30)
                                                            <td>
                                                                {{ $upginbs30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upginb31 as $upginbs31)
                                                            <td>
                                                                {{ $upginbs31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('UP GRADE INBOUND').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $upginbs1 }}, {{ $upginbs2 }}, {{ $upginbs3 }},
                                                    {{ $upginbs4 }}, {{ $upginbs5 }}, {{ $upginbs6 }},
                                                    {{ $upginbs7 }}, {{ $upginbs8 }}, {{ $upginbs9 }},
                                                    {{ $upginbs10 }}, {{ $upginbs11 }}, {{ $upginbs12 }},
                                                    {{ $upginbs13 }}, {{ $upginbs14 }}, {{ $upginbs15 }},
                                                    {{ $upginbs16 }}, {{ $upginbs17 }}, {{ $upginbs18 }},
                                                    {{ $upginbs19 }}, {{ $upginbs20 }}, {{ $upginbs21 }},
                                                    {{ $upginbs22 }}, {{ $upginbs23 }}, {{ $upginbs24 }},
                                                    {{ $upginbs25 }}, {{ $upginbs26 }}, {{ $upginbs27 }},
                                                    {{ $upginbs28 }}, {{ $upginbs29 }}, {{ $upginbs30 }},
                                                    {{ $upginbs31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN UP GRADE INBOUND --}}

                                {{-- INICIO UP GRADE DIGITAL --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">UP GRADE DIGITAL</h5>
                                            <div style="height:276px">
                                                <canvas id="UP GRADE DIGITAL"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($upgradedig1 as $upgradedigs1)
                                                            <td>
                                                                {{ $upgradedigs1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig2 as $upgradedigs2)
                                                            <td>
                                                                {{ $upgradedigs2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig3 as $upgradedigs3)
                                                            <td>
                                                                {{ $upgradedigs3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig4 as $upgradedigs4)
                                                            <td>
                                                                {{ $upgradedigs4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig5 as $upgradedigs5)
                                                            <td>
                                                                {{ $upgradedigs5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig6 as $upgradedigs6)
                                                            <td>
                                                                {{ $upgradedigs6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig7 as $upgradedigs7)
                                                            <td>
                                                                {{ $upgradedigs7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig8 as $upgradedigs8)
                                                            <td>
                                                                {{ $upgradedigs8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig9 as $upgradedigs9)
                                                            <td>
                                                                {{ $upgradedigs9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig10 as $upgradedigs10)
                                                            <td>
                                                                {{ $upgradedigs10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig11 as $upgradedigs11)
                                                            <td>
                                                                {{ $upgradedigs11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig12 as $upgradedigs12)
                                                            <td>
                                                                {{ $upgradedigs12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig13 as $upgradedigs13)
                                                            <td>
                                                                {{ $upgradedigs13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig14 as $upgradedigs14)
                                                            <td>
                                                                {{ $upgradedigs14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig15 as $upgradedigs15)
                                                            <td>
                                                                {{ $upgradedigs15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig16 as $upgradedigs16)
                                                            <td>
                                                                {{ $upgradedigs16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig17 as $upgradedigs17)
                                                            <td>
                                                                {{ $upgradedigs17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig18 as $upgradedigs18)
                                                            <td>
                                                                {{ $upgradedigs18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig19 as $upgradedigs19)
                                                            <td>
                                                                {{ $upgradedigs19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig20 as $upgradedigs20)
                                                            <td>
                                                                {{ $upgradedigs20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig21 as $upgradedigs21)
                                                            <td>
                                                                {{ $upgradedigs21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig22 as $upgradedigs22)
                                                            <td>
                                                                {{ $upgradedigs22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig23 as $upgradedigs23)
                                                            <td>
                                                                {{ $upgradedigs23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig24 as $upgradedigs24)
                                                            <td>
                                                                {{ $upgradedigs24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig25 as $upgradedigs25)
                                                            <td>
                                                                {{ $upgradedigs25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig26 as $upgradedigs26)
                                                            <td>
                                                                {{ $upgradedigs26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig27 as $upgradedigs27)
                                                            <td>
                                                                {{ $upgradedigs27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig28 as $upgradedigs28)
                                                            <td>
                                                                {{ $upgradedigs28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig29 as $upgradedigs29)
                                                            <td>
                                                                {{ $upgradedigs29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig30 as $upgradedigs30)
                                                            <td>
                                                                {{ $upgradedigs30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradedig31 as $upgradedigs31)
                                                            <td>
                                                                {{ $upgradedigs31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('UP GRADE DIGITAL').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $upgradedigs1 }}, {{ $upgradedigs2 }}, {{ $upgradedigs3 }},
                                                    {{ $upgradedigs4 }}, {{ $upgradedigs5 }}, {{ $upgradedigs6 }},
                                                    {{ $upgradedigs7 }}, {{ $upgradedigs8 }}, {{ $upgradedigs9 }},
                                                    {{ $upgradedigs10 }}, {{ $upgradedigs11 }}, {{ $upgradedigs12 }},
                                                    {{ $upgradedigs13 }}, {{ $upgradedigs14 }}, {{ $upgradedigs15 }},
                                                    {{ $upgradedigs16 }}, {{ $upgradedigs17 }}, {{ $upgradedigs18 }},
                                                    {{ $upgradedigs19 }}, {{ $upgradedigs20 }}, {{ $upgradedigs21 }},
                                                    {{ $upgradedigs22 }}, {{ $upgradedigs23 }}, {{ $upgradedigs24 }},
                                                    {{ $upgradedigs25 }}, {{ $upgradedigs26 }}, {{ $upgradedigs27 }},
                                                    {{ $upgradedigs28 }}, {{ $upgradedigs29 }}, {{ $upgradedigs30 }},
                                                    {{ $upgradedigs31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN UP GRADE DIGITAL --}}

                                {{-- INICIO UP GRADE TELEVENTAS --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">UP GRADE TELEVENTAS</h5>
                                            <div style="height:276px">
                                                <canvas id="UP GRADE TELEVENTAS"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($upgradetel1 as $upgradetels1)
                                                            <td>
                                                                {{ $upgradetels1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel2 as $upgradetels2)
                                                            <td>
                                                                {{ $upgradetels2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel3 as $upgradetels3)
                                                            <td>
                                                                {{ $upgradetels3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel4 as $upgradetels4)
                                                            <td>
                                                                {{ $upgradetels4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel5 as $upgradetels5)
                                                            <td>
                                                                {{ $upgradetels5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel6 as $upgradetels6)
                                                            <td>
                                                                {{ $upgradetels6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel7 as $upgradetels7)
                                                            <td>
                                                                {{ $upgradetels7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel8 as $upgradetels8)
                                                            <td>
                                                                {{ $upgradetels8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel9 as $upgradetels9)
                                                            <td>
                                                                {{ $upgradetels9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel10 as $upgradetels10)
                                                            <td>
                                                                {{ $upgradetels10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel11 as $upgradetels11)
                                                            <td>
                                                                {{ $upgradetels11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel12 as $upgradetels12)
                                                            <td>
                                                                {{ $upgradetels12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel13 as $upgradetels13)
                                                            <td>
                                                                {{ $upgradetels13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel14 as $upgradetels14)
                                                            <td>
                                                                {{ $upgradetels14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel15 as $upgradetels15)
                                                            <td>
                                                                {{ $upgradetels15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel16 as $upgradetels16)
                                                            <td>
                                                                {{ $upgradetels16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel17 as $upgradetels17)
                                                            <td>
                                                                {{ $upgradetels17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel18 as $upgradetels18)
                                                            <td>
                                                                {{ $upgradetels18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel19 as $upgradetels19)
                                                            <td>
                                                                {{ $upgradetels19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel20 as $upgradetels20)
                                                            <td>
                                                                {{ $upgradetels20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel21 as $upgradetels21)
                                                            <td>
                                                                {{ $upgradetels21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel22 as $upgradetels22)
                                                            <td>
                                                                {{ $upgradetels22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel23 as $upgradetels23)
                                                            <td>
                                                                {{ $upgradetels23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel24 as $upgradetels24)
                                                            <td>
                                                                {{ $upgradetels24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel25 as $upgradetels25)
                                                            <td>
                                                                {{ $upgradetels25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel26 as $upgradetels26)
                                                            <td>
                                                                {{ $upgradetels26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel27 as $upgradetels27)
                                                            <td>
                                                                {{ $upgradetels27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel28 as $upgradetels28)
                                                            <td>
                                                                {{ $upgradetels28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel29 as $upgradetels29)
                                                            <td>
                                                                {{ $upgradetels29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel30 as $upgradetels30)
                                                            <td>
                                                                {{ $upgradetels30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($upgradetel31 as $upgradetels31)
                                                            <td>
                                                                {{ $upgradetels31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('UP GRADE TELEVENTAS').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $upgradetels1 }}, {{ $upgradetels2 }}, {{ $upgradetels3 }},
                                                    {{ $upgradetels4 }}, {{ $upgradetels5 }}, {{ $upgradetels6 }},
                                                    {{ $upgradetels7 }}, {{ $upgradetels8 }}, {{ $upgradetels9 }},
                                                    {{ $upgradetels10 }}, {{ $upgradetels11 }}, {{ $upgradetels12 }},
                                                    {{ $upgradetels13 }}, {{ $upgradetels14 }}, {{ $upgradetels15 }},
                                                    {{ $upgradetels16 }}, {{ $upgradetels17 }}, {{ $upgradetels18 }},
                                                    {{ $upgradetels19 }}, {{ $upgradetels20 }}, {{ $upgradetels21 }},
                                                    {{ $upgradetels22 }}, {{ $upgradetels23 }}, {{ $upgradetels24 }},
                                                    {{ $upgradetels25 }}, {{ $upgradetels26 }}, {{ $upgradetels27 }},
                                                    {{ $upgradetels28 }}, {{ $upgradetels29 }}, {{ $upgradetels30 }},
                                                    {{ $upgradetels31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN UP GRADE TELEVENTAS --}}

                                {{-- INICIO PRE POST INBOUND --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">PRE POST INBOUND</h5>
                                            <div style="height:276px">
                                                <canvas id="preinbs POST INBOUND"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($preinb1 as $preinbs1)
                                                            <td>
                                                                {{ $preinbs1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb2 as $preinbs2)
                                                            <td>
                                                                {{ $preinbs2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb3 as $preinbs3)
                                                            <td>
                                                                {{ $preinbs3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb4 as $preinbs4)
                                                            <td>
                                                                {{ $preinbs4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb5 as $preinbs5)
                                                            <td>
                                                                {{ $preinbs5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb6 as $preinbs6)
                                                            <td>
                                                                {{ $preinbs6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb7 as $preinbs7)
                                                            <td>
                                                                {{ $preinbs7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb8 as $preinbs8)
                                                            <td>
                                                                {{ $preinbs8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb9 as $preinbs9)
                                                            <td>
                                                                {{ $preinbs9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb10 as $preinbs10)
                                                            <td>
                                                                {{ $preinbs10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb11 as $preinbs11)
                                                            <td>
                                                                {{ $preinbs11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb12 as $preinbs12)
                                                            <td>
                                                                {{ $preinbs12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb13 as $preinbs13)
                                                            <td>
                                                                {{ $preinbs13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb14 as $preinbs14)
                                                            <td>
                                                                {{ $preinbs14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb15 as $preinbs15)
                                                            <td>
                                                                {{ $preinbs15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb16 as $preinbs16)
                                                            <td>
                                                                {{ $preinbs16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb17 as $preinbs17)
                                                            <td>
                                                                {{ $preinbs17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb18 as $preinbs18)
                                                            <td>
                                                                {{ $preinbs18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb19 as $preinbs19)
                                                            <td>
                                                                {{ $preinbs19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb20 as $preinbs20)
                                                            <td>
                                                                {{ $preinbs20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb21 as $preinbs21)
                                                            <td>
                                                                {{ $preinbs21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb22 as $preinbs22)
                                                            <td>
                                                                {{ $preinbs22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb23 as $preinbs23)
                                                            <td>
                                                                {{ $preinbs23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb24 as $preinbs24)
                                                            <td>
                                                                {{ $preinbs24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb25 as $preinbs25)
                                                            <td>
                                                                {{ $preinbs25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb26 as $preinbs26)
                                                            <td>
                                                                {{ $preinbs26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb27 as $preinbs27)
                                                            <td>
                                                                {{ $preinbs27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb28 as $preinbs28)
                                                            <td>
                                                                {{ $preinbs28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb29 as $preinbs29)
                                                            <td>
                                                                {{ $preinbs29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb30 as $preinbs30)
                                                            <td>
                                                                {{ $preinbs30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($preinb31 as $preinbs31)
                                                            <td>
                                                                {{ $preinbs31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('preinbs POST INBOUND').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $preinbs1 }}, {{ $preinbs2 }}, {{ $preinbs3 }},
                                                    {{ $preinbs4 }}, {{ $preinbs5 }}, {{ $preinbs6 }},
                                                    {{ $preinbs7 }}, {{ $preinbs8 }}, {{ $preinbs9 }},
                                                    {{ $preinbs10 }}, {{ $preinbs11 }}, {{ $preinbs12 }},
                                                    {{ $preinbs13 }}, {{ $preinbs14 }}, {{ $preinbs15 }},
                                                    {{ $preinbs16 }}, {{ $preinbs17 }}, {{ $preinbs18 }},
                                                    {{ $preinbs19 }}, {{ $preinbs20 }}, {{ $preinbs21 }},
                                                    {{ $preinbs22 }}, {{ $preinbs23 }}, {{ $preinbs24 }},
                                                    {{ $preinbs25 }}, {{ $preinbs26 }}, {{ $preinbs27 }},
                                                    {{ $preinbs28 }}, {{ $preinbs29 }}, {{ $preinbs30 }},
                                                    {{ $preinbs31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN PRE POST INBOUND --}}

                                {{-- INICIO PRE POST DIGITAL --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">PRE POST DIGITAL</h5>
                                            <div style="height:276px">
                                                <canvas id="PRE POST DIGITAL"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($predig1 as $predigs1)
                                                            <td>
                                                                {{ $predigs1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig2 as $predigs2)
                                                            <td>
                                                                {{ $predigs2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig3 as $predigs3)
                                                            <td>
                                                                {{ $predigs3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig4 as $predigs4)
                                                            <td>
                                                                {{ $predigs4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig5 as $predigs5)
                                                            <td>
                                                                {{ $predigs5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig6 as $predigs6)
                                                            <td>
                                                                {{ $predigs6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig7 as $predigs7)
                                                            <td>
                                                                {{ $predigs7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig8 as $predigs8)
                                                            <td>
                                                                {{ $predigs8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig9 as $predigs9)
                                                            <td>
                                                                {{ $predigs9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig10 as $predigs10)
                                                            <td>
                                                                {{ $predigs10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig11 as $predigs11)
                                                            <td>
                                                                {{ $predigs11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig12 as $predigs12)
                                                            <td>
                                                                {{ $predigs12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig13 as $predigs13)
                                                            <td>
                                                                {{ $predigs13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig14 as $predigs14)
                                                            <td>
                                                                {{ $predigs14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig15 as $predigs15)
                                                            <td>
                                                                {{ $predigs15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig16 as $predigs16)
                                                            <td>
                                                                {{ $predigs16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig17 as $predigs17)
                                                            <td>
                                                                {{ $predigs17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig18 as $predigs18)
                                                            <td>
                                                                {{ $predigs18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig19 as $predigs19)
                                                            <td>
                                                                {{ $predigs19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig20 as $predigs20)
                                                            <td>
                                                                {{ $predigs20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig21 as $predigs21)
                                                            <td>
                                                                {{ $predigs21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig22 as $predigs22)
                                                            <td>
                                                                {{ $predigs22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig23 as $predigs23)
                                                            <td>
                                                                {{ $predigs23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig24 as $predigs24)
                                                            <td>
                                                                {{ $predigs24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig25 as $predigs25)
                                                            <td>
                                                                {{ $predigs25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig26 as $predigs26)
                                                            <td>
                                                                {{ $predigs26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig27 as $predigs27)
                                                            <td>
                                                                {{ $predigs27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig28 as $predigs28)
                                                            <td>
                                                                {{ $predigs28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig29 as $predigs29)
                                                            <td>
                                                                {{ $predigs29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig30 as $predigs30)
                                                            <td>
                                                                {{ $predigs30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($predig31 as $predigs31)
                                                            <td>
                                                                {{ $predigs31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('PRE POST DIGITAL').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $predigs1 }}, {{ $predigs2 }}, {{ $predigs3 }},
                                                    {{ $predigs4 }}, {{ $predigs5 }}, {{ $predigs6 }},
                                                    {{ $predigs7 }}, {{ $predigs8 }}, {{ $predigs9 }},
                                                    {{ $predigs10 }}, {{ $predigs11 }}, {{ $predigs12 }},
                                                    {{ $predigs13 }}, {{ $predigs14 }}, {{ $predigs15 }},
                                                    {{ $predigs16 }}, {{ $predigs17 }}, {{ $predigs18 }},
                                                    {{ $predigs19 }}, {{ $predigs20 }}, {{ $predigs21 }},
                                                    {{ $predigs22 }}, {{ $predigs23 }}, {{ $predigs24 }},
                                                    {{ $predigs25 }}, {{ $predigs26 }}, {{ $predigs27 }},
                                                    {{ $predigs28 }}, {{ $predigs29 }}, {{ $predigs30 }},
                                                    {{ $predigs31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN PRE POST DIGITAL --}}

                                {{-- INICIO PRE POST TELEVENTAS --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">PRE POST TELEVENTAS</h5>
                                            <div style="height:276px">
                                                <canvas id="PRE POST TELEVENTAS"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($pretel1 as $pretelv1)
                                                            <td>
                                                                {{ $pretelv1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel2 as $pretelv2)
                                                            <td>
                                                                {{ $pretelv2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel3 as $pretelv3)
                                                            <td>
                                                                {{ $pretelv3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel4 as $pretelv4)
                                                            <td>
                                                                {{ $pretelv4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel5 as $pretelv5)
                                                            <td>
                                                                {{ $pretelv5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel6 as $pretelv6)
                                                            <td>
                                                                {{ $pretelv6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel7 as $pretelv7)
                                                            <td>
                                                                {{ $pretelv7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel8 as $pretelv8)
                                                            <td>
                                                                {{ $pretelv8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel9 as $pretelv9)
                                                            <td>
                                                                {{ $pretelv9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel10 as $pretelv10)
                                                            <td>
                                                                {{ $pretelv10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel11 as $pretelv11)
                                                            <td>
                                                                {{ $pretelv11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel12 as $pretelv12)
                                                            <td>
                                                                {{ $pretelv12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel13 as $pretelv13)
                                                            <td>
                                                                {{ $pretelv13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel14 as $pretelv14)
                                                            <td>
                                                                {{ $pretelv14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel15 as $pretelv15)
                                                            <td>
                                                                {{ $pretelv15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel16 as $pretelv16)
                                                            <td>
                                                                {{ $pretelv16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel17 as $pretelv17)
                                                            <td>
                                                                {{ $pretelv17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel18 as $pretelv18)
                                                            <td>
                                                                {{ $pretelv18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel19 as $pretelv19)
                                                            <td>
                                                                {{ $pretelv19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel20 as $pretelv20)
                                                            <td>
                                                                {{ $pretelv20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel21 as $pretelv21)
                                                            <td>
                                                                {{ $pretelv21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel22 as $pretelv22)
                                                            <td>
                                                                {{ $pretelv22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel23 as $pretelv23)
                                                            <td>
                                                                {{ $pretelv23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel24 as $pretelv24)
                                                            <td>
                                                                {{ $pretelv24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel25 as $pretelv25)
                                                            <td>
                                                                {{ $pretelv25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel26 as $pretelv26)
                                                            <td>
                                                                {{ $pretelv26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel27 as $pretelv27)
                                                            <td>
                                                                {{ $pretelv27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel28 as $pretelv28)
                                                            <td>
                                                                {{ $pretelv28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel29 as $pretelv29)
                                                            <td>
                                                                {{ $pretelv29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel30 as $pretelv30)
                                                            <td>
                                                                {{ $pretelv30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($pretel31 as $pretelv31)
                                                            <td>
                                                                {{ $pretelv31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('PRE POST TELEVENTAS').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $pretelv1 }}, {{ $pretelv2 }}, {{ $pretelv3 }},
                                                    {{ $pretelv4 }}, {{ $pretelv5 }}, {{ $pretelv6 }},
                                                    {{ $pretelv7 }}, {{ $pretelv8 }}, {{ $pretelv9 }},
                                                    {{ $pretelv10 }}, {{ $pretelv11 }}, {{ $pretelv12 }},
                                                    {{ $pretelv13 }}, {{ $pretelv14 }}, {{ $pretelv15 }},
                                                    {{ $pretelv16 }}, {{ $pretelv17 }}, {{ $pretelv18 }},
                                                    {{ $pretelv19 }}, {{ $pretelv20 }}, {{ $pretelv21 }},
                                                    {{ $pretelv22 }}, {{ $pretelv23 }}, {{ $pretelv24 }},
                                                    {{ $pretelv25 }}, {{ $pretelv26 }}, {{ $pretelv27 }},
                                                    {{ $pretelv28 }}, {{ $pretelv29 }}, {{ $pretelv30 }},
                                                    {{ $pretelv31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN PRE POST TELEVENTAS --}}

                                {{-- INICIO FIJA INBOUND --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">FIJA INBOUND</h5>
                                            <div style="height:276px">
                                                <canvas id="FIJA INBOUND"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($fijainb1 as $fijainbs1)
                                                            <td>
                                                                {{ $fijainbs1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb2 as $fijainbs2)
                                                            <td>
                                                                {{ $fijainbs2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb3 as $fijainbs3)
                                                            <td>
                                                                {{ $fijainbs3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb4 as $fijainbs4)
                                                            <td>
                                                                {{ $fijainbs4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb5 as $fijainbs5)
                                                            <td>
                                                                {{ $fijainbs5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb6 as $fijainbs6)
                                                            <td>
                                                                {{ $fijainbs6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb7 as $fijainbs7)
                                                            <td>
                                                                {{ $fijainbs7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb8 as $fijainbs8)
                                                            <td>
                                                                {{ $fijainbs8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb9 as $fijainbs9)
                                                            <td>
                                                                {{ $fijainbs9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb10 as $fijainbs10)
                                                            <td>
                                                                {{ $fijainbs10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb11 as $fijainbs11)
                                                            <td>
                                                                {{ $fijainbs11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb12 as $fijainbs12)
                                                            <td>
                                                                {{ $fijainbs12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb13 as $fijainbs13)
                                                            <td>
                                                                {{ $fijainbs13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb14 as $fijainbs14)
                                                            <td>
                                                                {{ $fijainbs14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb15 as $fijainbs15)
                                                            <td>
                                                                {{ $fijainbs15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb16 as $fijainbs16)
                                                            <td>
                                                                {{ $fijainbs16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb17 as $fijainbs17)
                                                            <td>
                                                                {{ $fijainbs17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb18 as $fijainbs18)
                                                            <td>
                                                                {{ $fijainbs18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb19 as $fijainbs19)
                                                            <td>
                                                                {{ $fijainbs19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb20 as $fijainbs20)
                                                            <td>
                                                                {{ $fijainbs20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb21 as $fijainbs21)
                                                            <td>
                                                                {{ $fijainbs21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb22 as $fijainbs22)
                                                            <td>
                                                                {{ $fijainbs22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb23 as $fijainbs23)
                                                            <td>
                                                                {{ $fijainbs23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb24 as $fijainbs24)
                                                            <td>
                                                                {{ $fijainbs24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb25 as $fijainbs25)
                                                            <td>
                                                                {{ $fijainbs25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb26 as $fijainbs26)
                                                            <td>
                                                                {{ $fijainbs26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb27 as $fijainbs27)
                                                            <td>
                                                                {{ $fijainbs27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb28 as $fijainbs28)
                                                            <td>
                                                                {{ $fijainbs28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb29 as $fijainbs29)
                                                            <td>
                                                                {{ $fijainbs29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb30 as $fijainbs30)
                                                            <td>
                                                                {{ $fijainbs30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijainb31 as $fijainbs31)
                                                            <td>
                                                                {{ $fijainbs31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('FIJA INBOUND').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $fijainbs1 }}, {{ $fijainbs2 }}, {{ $fijainbs3 }},
                                                    {{ $fijainbs4 }}, {{ $fijainbs5 }}, {{ $fijainbs6 }},
                                                    {{ $fijainbs7 }}, {{ $fijainbs8 }}, {{ $fijainbs9 }},
                                                    {{ $fijainbs10 }}, {{ $fijainbs11 }}, {{ $fijainbs12 }},
                                                    {{ $fijainbs13 }}, {{ $fijainbs14 }}, {{ $fijainbs15 }},
                                                    {{ $fijainbs16 }}, {{ $fijainbs17 }}, {{ $fijainbs18 }},
                                                    {{ $fijainbs19 }}, {{ $fijainbs20 }}, {{ $fijainbs21 }},
                                                    {{ $fijainbs22 }}, {{ $fijainbs23 }}, {{ $fijainbs24 }},
                                                    {{ $fijainbs25 }}, {{ $fijainbs26 }}, {{ $fijainbs27 }},
                                                    {{ $fijainbs28 }}, {{ $fijainbs29 }}, {{ $fijainbs30 }},
                                                    {{ $fijainbs31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN FIJA INBOUND --}}

                                {{-- INICIO FIJA DIGITAL --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">FIJA DIGITAL</h5>
                                            <div style="height:276px">
                                                <canvas id="FIJA DIGITAL"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($fijadig1 as $fijadig1)
                                                            <td>
                                                                {{ $fijadig1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig2 as $fijadig2)
                                                            <td>
                                                                {{ $fijadig2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig3 as $fijadig3)
                                                            <td>
                                                                {{ $fijadig3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig4 as $fijadig4)
                                                            <td>
                                                                {{ $fijadig4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig5 as $fijadig5)
                                                            <td>
                                                                {{ $fijadig5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig6 as $fijadig6)
                                                            <td>
                                                                {{ $fijadig6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig7 as $fijadig7)
                                                            <td>
                                                                {{ $fijadig7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig8 as $fijadig8)
                                                            <td>
                                                                {{ $fijadig8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig9 as $fijadig9)
                                                            <td>
                                                                {{ $fijadig9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig10 as $fijadig10)
                                                            <td>
                                                                {{ $fijadig10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig11 as $fijadig11)
                                                            <td>
                                                                {{ $fijadig11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig12 as $fijadig12)
                                                            <td>
                                                                {{ $fijadig12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig13 as $fijadig13)
                                                            <td>
                                                                {{ $fijadig13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig14 as $fijadig14)
                                                            <td>
                                                                {{ $fijadig14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig15 as $fijadig15)
                                                            <td>
                                                                {{ $fijadig15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig16 as $fijadig16)
                                                            <td>
                                                                {{ $fijadig16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig17 as $fijadig17)
                                                            <td>
                                                                {{ $fijadig17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig18 as $fijadig18)
                                                            <td>
                                                                {{ $fijadig18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig19 as $fijadig19)
                                                            <td>
                                                                {{ $fijadig19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig20 as $fijadig20)
                                                            <td>
                                                                {{ $fijadig20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig21 as $fijadig21)
                                                            <td>
                                                                {{ $fijadig21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig22 as $fijadig22)
                                                            <td>
                                                                {{ $fijadig22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig23 as $fijadig23)
                                                            <td>
                                                                {{ $fijadig23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig24 as $fijadig24)
                                                            <td>
                                                                {{ $fijadig24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig25 as $fijadig25)
                                                            <td>
                                                                {{ $fijadig25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig26 as $fijadig26)
                                                            <td>
                                                                {{ $fijadig26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig27 as $fijadig27)
                                                            <td>
                                                                {{ $fijadig27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig28 as $fijadig28)
                                                            <td>
                                                                {{ $fijadig28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig29 as $fijadig29)
                                                            <td>
                                                                {{ $fijadig29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig30 as $fijadig30)
                                                            <td>
                                                                {{ $fijadig30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijadig31 as $fijadig31)
                                                            <td>
                                                                {{ $fijadig31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('FIJA DIGITAL').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $fijadig1 }}, {{ $fijadig2 }}, {{ $fijadig3 }},
                                                    {{ $fijadig4 }}, {{ $fijadig5 }}, {{ $fijadig6 }},
                                                    {{ $fijadig7 }}, {{ $fijadig8 }}, {{ $fijadig9 }},
                                                    {{ $fijadig10 }}, {{ $fijadig11 }}, {{ $fijadig12 }},
                                                    {{ $fijadig13 }}, {{ $fijadig14 }}, {{ $fijadig15 }},
                                                    {{ $fijadig16 }}, {{ $fijadig17 }}, {{ $fijadig18 }},
                                                    {{ $fijadig19 }}, {{ $fijadig20 }}, {{ $fijadig21 }},
                                                    {{ $fijadig22 }}, {{ $fijadig23 }}, {{ $fijadig24 }},
                                                    {{ $fijadig25 }}, {{ $fijadig26 }}, {{ $fijadig27 }},
                                                    {{ $fijadig28 }}, {{ $fijadig29 }}, {{ $fijadig30 }},
                                                    {{ $fijadig31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN FIJA DIGITAL --}}

                                {{-- INICIO FIJA TELEVENTAS --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">FIJA TELEVENTAS</h5>
                                            <div style="height:276px">
                                                <canvas id="FIJA TELEVENTAS"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($fijate1 as $fijatel1)
                                                            <td>
                                                                {{ $fijatel1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate2 as $fijatel2)
                                                            <td>
                                                                {{ $fijatel2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate3 as $fijatel3)
                                                            <td>
                                                                {{ $fijatel3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate4 as $fijatel4)
                                                            <td>
                                                                {{ $fijatel4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate5 as $fijatel5)
                                                            <td>
                                                                {{ $fijatel5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate6 as $fijatel6)
                                                            <td>
                                                                {{ $fijatel6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate7 as $fijatel7)
                                                            <td>
                                                                {{ $fijatel7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate8 as $fijatel8)
                                                            <td>
                                                                {{ $fijatel8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate9 as $fijatel9)
                                                            <td>
                                                                {{ $fijatel9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate10 as $fijatel10)
                                                            <td>
                                                                {{ $fijatel10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate11 as $fijatel11)
                                                            <td>
                                                                {{ $fijatel11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate12 as $fijatel12)
                                                            <td>
                                                                {{ $fijatel12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate13 as $fijatel13)
                                                            <td>
                                                                {{ $fijatel13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate14 as $fijatel14)
                                                            <td>
                                                                {{ $fijatel14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate15 as $fijatel15)
                                                            <td>
                                                                {{ $fijatel15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate16 as $fijatel16)
                                                            <td>
                                                                {{ $fijatel16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate17 as $fijatel17)
                                                            <td>
                                                                {{ $fijatel17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate18 as $fijatel18)
                                                            <td>
                                                                {{ $fijatel18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate19 as $fijatel19)
                                                            <td>
                                                                {{ $fijatel19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate20 as $fijatel20)
                                                            <td>
                                                                {{ $fijatel20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate21 as $fijatel21)
                                                            <td>
                                                                {{ $fijatel21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate22 as $fijatel22)
                                                            <td>
                                                                {{ $fijatel22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate23 as $fijatel23)
                                                            <td>
                                                                {{ $fijatel23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate24 as $fijatel24)
                                                            <td>
                                                                {{ $fijatel24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate25 as $fijatel25)
                                                            <td>
                                                                {{ $fijatel25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate26 as $fijatel26)
                                                            <td>
                                                                {{ $fijatel26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate27 as $fijatel27)
                                                            <td>
                                                                {{ $fijatel27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate28 as $fijatel28)
                                                            <td>
                                                                {{ $fijatel28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate29 as $fijatel29)
                                                            <td>
                                                                {{ $fijatel29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate30 as $fijatel30)
                                                            <td>
                                                                {{ $fijatel30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($fijate31 as $fijatel31)
                                                            <td>
                                                                {{ $fijatel31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('FIJA TELEVENTAS').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $fijatel1 }}, {{ $fijatel2 }}, {{ $fijatel3 }},
                                                    {{ $fijatel4 }}, {{ $fijatel5 }}, {{ $fijatel6 }},
                                                    {{ $fijatel7 }}, {{ $fijatel8 }}, {{ $fijatel9 }},
                                                    {{ $fijatel10 }}, {{ $fijatel11 }}, {{ $fijatel12 }},
                                                    {{ $fijatel13 }}, {{ $fijatel14 }}, {{ $fijatel15 }},
                                                    {{ $fijatel16 }}, {{ $fijatel17 }}, {{ $fijatel18 }},
                                                    {{ $fijatel19 }}, {{ $fijatel20 }}, {{ $fijatel21 }},
                                                    {{ $fijatel22 }}, {{ $fijatel23 }}, {{ $fijatel24 }},
                                                    {{ $fijatel25 }}, {{ $fijatel26 }}, {{ $fijatel27 }},
                                                    {{ $fijatel28 }}, {{ $fijatel29 }}, {{ $fijatel30 }},
                                                    {{ $fijatel31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN FIJA TELEVENTAS --}}

                                {{-- INICIO LINEA NUEVA --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Linea Nueva</h5>
                                            <div style="height:276px">
                                                <canvas id="lineanueva"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($l1 as $ln1)
                                                            <td>
                                                                {{ $ln1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l2 as $ln2)
                                                            <td>
                                                                {{ $ln2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l3 as $ln3)
                                                            <td>
                                                                {{ $ln3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l4 as $ln4)
                                                            <td>
                                                                {{ $ln4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l5 as $ln5)
                                                            <td>
                                                                {{ $ln5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l6 as $ln6)
                                                            <td>
                                                                {{ $ln6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l7 as $ln7)
                                                            <td>
                                                                {{ $ln7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l8 as $ln8)
                                                            <td>
                                                                {{ $ln8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l9 as $ln9)
                                                            <td>
                                                                {{ $ln9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l10 as $ln10)
                                                            <td>
                                                                {{ $ln10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l11 as $ln11)
                                                            <td>
                                                                {{ $ln11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l12 as $ln12)
                                                            <td>
                                                                {{ $ln12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l13 as $ln13)
                                                            <td>
                                                                {{ $ln13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l14 as $ln14)
                                                            <td>
                                                                {{ $ln14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l15 as $ln15)
                                                            <td>
                                                                {{ $ln15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l16 as $ln16)
                                                            <td>
                                                                {{ $ln16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l17 as $ln17)
                                                            <td>
                                                                {{ $ln17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l18 as $ln18)
                                                            <td>
                                                                {{ $ln18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l19 as $ln19)
                                                            <td>
                                                                {{ $ln19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l20 as $ln20)
                                                            <td>
                                                                {{ $ln20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l21 as $ln21)
                                                            <td>
                                                                {{ $ln21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l22 as $ln22)
                                                            <td>
                                                                {{ $ln22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l23 as $ln23)
                                                            <td>
                                                                {{ $ln23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l24 as $ln24)
                                                            <td>
                                                                {{ $ln24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l25 as $ln25)
                                                            <td>
                                                                {{ $ln25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l26 as $ln26)
                                                            <td>
                                                                {{ $ln26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l27 as $ln27)
                                                            <td>
                                                                {{ $ln27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l28 as $ln28)
                                                            <td>
                                                                {{ $ln28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l29 as $ln29)
                                                            <td>
                                                                {{ $ln29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l30 as $ln30)
                                                            <td>
                                                                {{ $ln30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($l31 as $ln31)
                                                            <td>
                                                                {{ $ln31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('lineanueva').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $ln1 }}, {{ $ln2 }}, {{ $ln3 }},
                                                    {{ $ln4 }}, {{ $ln5 }}, {{ $ln6 }},
                                                    {{ $ln7 }}, {{ $ln8 }}, {{ $ln9 }},
                                                    {{ $ln10 }}, {{ $ln11 }}, {{ $ln12 }},
                                                    {{ $ln13 }}, {{ $ln14 }}, {{ $ln15 }},
                                                    {{ $ln16 }}, {{ $ln17 }}, {{ $ln18 }},
                                                    {{ $ln19 }}, {{ $ln20 }}, {{ $ln21 }},
                                                    {{ $ln22 }}, {{ $ln23 }}, {{ $ln24 }},
                                                    {{ $ln25 }}, {{ $ln26 }}, {{ $ln27 }},
                                                    {{ $ln28 }}, {{ $ln29 }}, {{ $ln30 }},
                                                    {{ $ln31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN LINEA NUEVA --}}

                                {{-- INICIO PHOENIX --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Phoenix</h5>
                                            <div style="height:276px">
                                                <canvas id="phoenix"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($ph1 as $pho1)
                                                            <td>
                                                                {{ $pho1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph2 as $pho2)
                                                            <td>
                                                                {{ $pho2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph3 as $pho3)
                                                            <td>
                                                                {{ $pho3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph4 as $pho4)
                                                            <td>
                                                                {{ $pho4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph5 as $pho5)
                                                            <td>
                                                                {{ $pho5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph6 as $pho6)
                                                            <td>
                                                                {{ $pho6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph7 as $pho7)
                                                            <td>
                                                                {{ $pho7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph8 as $pho8)
                                                            <td>
                                                                {{ $pho8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph9 as $pho9)
                                                            <td>
                                                                {{ $pho9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph10 as $pho10)
                                                            <td>
                                                                {{ $pho10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph11 as $pho11)
                                                            <td>
                                                                {{ $pho11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph12 as $pho12)
                                                            <td>
                                                                {{ $pho12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph13 as $pho13)
                                                            <td>
                                                                {{ $pho13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph14 as $pho14)
                                                            <td>
                                                                {{ $pho14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph15 as $pho15)
                                                            <td>
                                                                {{ $pho15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph16 as $pho16)
                                                            <td>
                                                                {{ $pho16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph17 as $pho17)
                                                            <td>
                                                                {{ $pho17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph18 as $pho18)
                                                            <td>
                                                                {{ $pho18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph19 as $pho19)
                                                            <td>
                                                                {{ $pho19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph20 as $pho20)
                                                            <td>
                                                                {{ $pho20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph21 as $pho21)
                                                            <td>
                                                                {{ $pho21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph22 as $pho22)
                                                            <td>
                                                                {{ $pho22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph23 as $pho23)
                                                            <td>
                                                                {{ $pho23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph24 as $pho24)
                                                            <td>
                                                                {{ $pho24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph25 as $pho25)
                                                            <td>
                                                                {{ $pho25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph26 as $pho26)
                                                            <td>
                                                                {{ $pho26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph27 as $pho27)
                                                            <td>
                                                                {{ $pho27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph28 as $pho28)
                                                            <td>
                                                                {{ $pho28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph29 as $pho29)
                                                            <td>
                                                                {{ $pho29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph30 as $pho30)
                                                            <td>
                                                                {{ $pho30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ph31 as $pho31)
                                                            <td>
                                                                {{ $pho31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var ctx = document.getElementById('phoenix').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $pho1 }}, {{ $pho2 }}, {{ $pho3 }},
                                                    {{ $pho4 }}, {{ $pho5 }}, {{ $pho6 }},
                                                    {{ $pho7 }}, {{ $pho8 }}, {{ $pho9 }},
                                                    {{ $pho10 }}, {{ $pho11 }}, {{ $pho12 }},
                                                    {{ $pho13 }}, {{ $pho14 }}, {{ $pho15 }},
                                                    {{ $pho16 }}, {{ $pho17 }}, {{ $pho18 }},
                                                    {{ $pho19 }}, {{ $pho20 }}, {{ $pho21 }},
                                                    {{ $pho22 }}, {{ $pho23 }}, {{ $pho24 }},
                                                    {{ $pho25 }}, {{ $pho26 }}, {{ $pho27 }},
                                                    {{ $pho28 }}, {{ $pho29 }}, {{ $pho30 }},
                                                    {{ $pho31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN LINEA PHOENIX --}}

                                {{-- INICIO COMUNIDAD EMPRESARIAL --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Comunidad Empresarial</h5>
                                            <div style="height:276px">
                                                <canvas id="comunidad"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($ce1 as $tenportas1)
                                                            <td>
                                                                {{ $tenportas1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce2 as $tenportas2)
                                                            <td>
                                                                {{ $tenportas2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce3 as $tenportas3)
                                                            <td>
                                                                {{ $tenportas3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce4 as $tenportas4)
                                                            <td>
                                                                {{ $tenportas4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce5 as $tenportas5)
                                                            <td>
                                                                {{ $tenportas5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce6 as $tenportas6)
                                                            <td>
                                                                {{ $tenportas6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce7 as $tenportas7)
                                                            <td>
                                                                {{ $tenportas7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce8 as $tenportas8)
                                                            <td>
                                                                {{ $tenportas8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce9 as $tenportas9)
                                                            <td>
                                                                {{ $tenportas9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce10 as $tenportas10)
                                                            <td>
                                                                {{ $tenportas10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce11 as $tenportas11)
                                                            <td>
                                                                {{ $tenportas11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce12 as $tenportas12)
                                                            <td>
                                                                {{ $tenportas12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce13 as $tenportas13)
                                                            <td>
                                                                {{ $tenportas13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce14 as $tenportas14)
                                                            <td>
                                                                {{ $tenportas14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce15 as $tenportas15)
                                                            <td>
                                                                {{ $tenportas15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce16 as $tenportas16)
                                                            <td>
                                                                {{ $tenportas16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce17 as $tenportas17)
                                                            <td>
                                                                {{ $tenportas17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce18 as $tenportas18)
                                                            <td>
                                                                {{ $tenportas18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce19 as $tenportas19)
                                                            <td>
                                                                {{ $tenportas19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce20 as $tenportas20)
                                                            <td>
                                                                {{ $tenportas20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce21 as $tenportas21)
                                                            <td>
                                                                {{ $tenportas21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce22 as $tenportas22)
                                                            <td>
                                                                {{ $tenportas22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce23 as $tenportas23)
                                                            <td>
                                                                {{ $tenportas23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce24 as $tenportas24)
                                                            <td>
                                                                {{ $tenportas24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce25 as $tenportas25)
                                                            <td>
                                                                {{ $tenportas25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce26 as $tenportas26)
                                                            <td>
                                                                {{ $tenportas26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce27 as $tenportas27)
                                                            <td>
                                                                {{ $tenportas27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce28 as $tenportas28)
                                                            <td>
                                                                {{ $tenportas28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce29 as $tenportas29)
                                                            <td>
                                                                {{ $tenportas29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce30 as $tenportas30)
                                                            <td>
                                                                {{ $tenportas30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($ce31 as $tenportas31)
                                                            <td>
                                                                {{ $tenportas31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var ctx = document.getElementById('comunidad').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $tenportas1 }}, {{ $tenportas2 }}, {{ $tenportas3 }},
                                                    {{ $tenportas4 }}, {{ $tenportas5 }}, {{ $tenportas6 }},
                                                    {{ $tenportas7 }}, {{ $tenportas8 }}, {{ $tenportas9 }},
                                                    {{ $tenportas10 }},
                                                    {{ $tenportas11 }}, {{ $tenportas12 }}, {{ $tenportas13 }},
                                                    {{ $tenportas14 }}, {{ $tenportas15 }}, {{ $tenportas16 }},
                                                    {{ $tenportas17 }}, {{ $tenportas18 }}, {{ $tenportas19 }},
                                                    {{ $tenportas20 }},
                                                    {{ $tenportas21 }}, {{ $tenportas22 }}, {{ $tenportas23 }},
                                                    {{ $tenportas24 }}, {{ $tenportas25 }}, {{ $tenportas26 }},
                                                    {{ $tenportas27 }}, {{ $tenportas28 }}, {{ $tenportas29 }},
                                                    {{ $tenportas30 }},
                                                    {{ $tenportas31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN COMUNIDAD EMPRESARIAL --}}

                                {{-- INICIO  TENTEN PORTABILIDAD --}}

                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Ten-Ten Portabilidad</h5>
                                            <div style="height:276px">
                                                <canvas id="tentenporta"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($tenporta1 as $tenportas1)
                                                            <td>
                                                                {{ $tenportas1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta2 as $tenportas2)
                                                            <td>
                                                                {{ $tenportas2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta3 as $tenportas3)
                                                            <td>
                                                                {{ $tenportas3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta4 as $tenportas4)
                                                            <td>
                                                                {{ $tenportas4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta5 as $tenportas5)
                                                            <td>
                                                                {{ $tenportas5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta6 as $tenportas6)
                                                            <td>
                                                                {{ $tenportas6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta7 as $tenportas7)
                                                            <td>
                                                                {{ $tenportas7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta8 as $tenportas8)
                                                            <td>
                                                                {{ $tenportas8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta9 as $tenportas9)
                                                            <td>
                                                                {{ $tenportas9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta10 as $tenportas10)
                                                            <td>
                                                                {{ $tenportas10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta11 as $tenportas11)
                                                            <td>
                                                                {{ $tenportas11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta12 as $tenportas12)
                                                            <td>
                                                                {{ $tenportas12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta13 as $tenportas13)
                                                            <td>
                                                                {{ $tenportas13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta14 as $tenportas14)
                                                            <td>
                                                                {{ $tenportas14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta15 as $tenportas15)
                                                            <td>
                                                                {{ $tenportas15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta16 as $tenportas16)
                                                            <td>
                                                                {{ $tenportas16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta17 as $tenportas17)
                                                            <td>
                                                                {{ $tenportas17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta18 as $tenportas18)
                                                            <td>
                                                                {{ $tenportas18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta19 as $tenportas19)
                                                            <td>
                                                                {{ $tenportas19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta20 as $tenportas20)
                                                            <td>
                                                                {{ $tenportas20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta21 as $tenportas21)
                                                            <td>
                                                                {{ $tenportas21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta22 as $tenportas22)
                                                            <td>
                                                                {{ $tenportas22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta23 as $tenportas23)
                                                            <td>
                                                                {{ $tenportas23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta24 as $tenportas24)
                                                            <td>
                                                                {{ $tenportas24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta25 as $tenportas25)
                                                            <td>
                                                                {{ $tenportas25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta26 as $tenportas26)
                                                            <td>
                                                                {{ $tenportas26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta27 as $tenportas27)
                                                            <td>
                                                                {{ $tenportas27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta28 as $tenportas28)
                                                            <td>
                                                                {{ $tenportas28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta29 as $tenportas29)
                                                            <td>
                                                                {{ $tenportas29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta30 as $tenportas30)
                                                            <td>
                                                                {{ $tenportas30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenporta31 as $tenportas31)
                                                            <td>
                                                                {{ $tenportas31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var ctx = document.getElementById('tentenporta').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $tenportas1 }}, {{ $tenportas2 }}, {{ $tenportas3 }},
                                                    {{ $tenportas4 }}, {{ $tenportas5 }}, {{ $tenportas6 }},
                                                    {{ $tenportas7 }}, {{ $tenportas8 }}, {{ $tenportas9 }},
                                                    {{ $tenportas10 }},
                                                    {{ $tenportas11 }}, {{ $tenportas12 }}, {{ $tenportas13 }},
                                                    {{ $tenportas14 }}, {{ $tenportas15 }}, {{ $tenportas16 }},
                                                    {{ $tenportas17 }}, {{ $tenportas18 }}, {{ $tenportas19 }},
                                                    {{ $tenportas20 }},
                                                    {{ $tenportas21 }}, {{ $tenportas22 }}, {{ $tenportas23 }},
                                                    {{ $tenportas24 }}, {{ $tenportas25 }}, {{ $tenportas26 }},
                                                    {{ $tenportas27 }}, {{ $tenportas28 }}, {{ $tenportas29 }},
                                                    {{ $tenportas30 }},
                                                    {{ $tenportas31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                                {{-- FIN  TENTEN PORTABILIDAD --}}

                                {{-- INICIO  TENTEN MIGRACION --}}

                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Ten-Ten Migracion</h5>
                                            <div style="height:276px">
                                                <canvas id="tentenmigra"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($tenmigra1 as $tenmigras1)
                                                            <td>
                                                                {{ $tenmigras1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra2 as $tenmigras2)
                                                            <td>
                                                                {{ $tenmigras2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra3 as $tenmigras3)
                                                            <td>
                                                                {{ $tenmigras3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra4 as $tenmigras4)
                                                            <td>
                                                                {{ $tenmigras4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra5 as $tenmigras5)
                                                            <td>
                                                                {{ $tenmigras5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra6 as $tenmigras6)
                                                            <td>
                                                                {{ $tenmigras6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra7 as $tenmigras7)
                                                            <td>
                                                                {{ $tenmigras7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra8 as $tenmigras8)
                                                            <td>
                                                                {{ $tenmigras8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra9 as $tenmigras9)
                                                            <td>
                                                                {{ $tenmigras9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra10 as $tenmigras10)
                                                            <td>
                                                                {{ $tenmigras10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra11 as $tenmigras11)
                                                            <td>
                                                                {{ $tenmigras11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra12 as $tenmigras12)
                                                            <td>
                                                                {{ $tenmigras12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra13 as $tenmigras13)
                                                            <td>
                                                                {{ $tenmigras13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra14 as $tenmigras14)
                                                            <td>
                                                                {{ $tenmigras14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra15 as $tenmigras15)
                                                            <td>
                                                                {{ $tenmigras15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra16 as $tenmigras16)
                                                            <td>
                                                                {{ $tenmigras16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra17 as $tenmigras17)
                                                            <td>
                                                                {{ $tenmigras17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra18 as $tenmigras18)
                                                            <td>
                                                                {{ $tenmigras18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra19 as $tenmigras19)
                                                            <td>
                                                                {{ $tenmigras19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra20 as $tenmigras20)
                                                            <td>
                                                                {{ $tenmigras20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra21 as $tenmigras21)
                                                            <td>
                                                                {{ $tenmigras21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra22 as $tenmigras22)
                                                            <td>
                                                                {{ $tenmigras22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra23 as $tenmigras23)
                                                            <td>
                                                                {{ $tenmigras23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra24 as $tenmigras24)
                                                            <td>
                                                                {{ $tenmigras24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra25 as $tenmigras25)
                                                            <td>
                                                                {{ $tenmigras25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra26 as $tenmigras26)
                                                            <td>
                                                                {{ $tenmigras26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra27 as $tenmigras27)
                                                            <td>
                                                                {{ $tenmigras27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra28 as $tenmigras28)
                                                            <td>
                                                                {{ $tenmigras28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra29 as $tenmigras29)
                                                            <td>
                                                                {{ $tenmigras29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra30 as $tenmigras30)
                                                            <td>
                                                                {{ $tenmigras30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenmigra31 as $tenmigras31)
                                                            <td>
                                                                {{ $tenmigras31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var ctx = document.getElementById('tentenmigra').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $tenmigras1 }}, {{ $tenmigras2 }}, {{ $tenmigras3 }},
                                                    {{ $tenmigras4 }}, {{ $tenmigras5 }}, {{ $tenmigras6 }},
                                                    {{ $tenmigras7 }}, {{ $tenmigras8 }}, {{ $tenmigras9 }},
                                                    {{ $tenmigras10 }},
                                                    {{ $tenmigras11 }}, {{ $tenmigras12 }}, {{ $tenmigras13 }},
                                                    {{ $tenmigras14 }}, {{ $tenmigras15 }}, {{ $tenmigras16 }},
                                                    {{ $tenmigras17 }}, {{ $tenmigras18 }}, {{ $tenmigras19 }},
                                                    {{ $tenmigras20 }},
                                                    {{ $tenmigras21 }}, {{ $tenmigras22 }}, {{ $tenmigras23 }},
                                                    {{ $tenmigras24 }}, {{ $tenmigras25 }}, {{ $tenmigras26 }},
                                                    {{ $tenmigras27 }}, {{ $tenmigras28 }}, {{ $tenmigras29 }},
                                                    {{ $tenmigras30 }},
                                                    {{ $tenmigras31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                                {{-- FIN  TENTEN MIGRACION --}}

                                {{-- INICIO  TENTEN PREPOS --}}

                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Ten-Ten Prepos</h5>
                                            <div style="height:276px">
                                                <canvas id="tentepre"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($tenprepo1 as $tenprepos1)
                                                            <td>
                                                                {{ $tenprepos1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo2 as $tenprepos2)
                                                            <td>
                                                                {{ $tenprepos2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo3 as $tenprepos3)
                                                            <td>
                                                                {{ $tenprepos3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo4 as $tenprepos4)
                                                            <td>
                                                                {{ $tenprepos4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo5 as $tenprepos5)
                                                            <td>
                                                                {{ $tenprepos5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo6 as $tenprepos6)
                                                            <td>
                                                                {{ $tenprepos6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo7 as $tenprepos7)
                                                            <td>
                                                                {{ $tenprepos7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo8 as $tenprepos8)
                                                            <td>
                                                                {{ $tenprepos8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo9 as $tenprepos9)
                                                            <td>
                                                                {{ $tenprepos9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo10 as $tenprepos10)
                                                            <td>
                                                                {{ $tenprepos10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo11 as $tenprepos11)
                                                            <td>
                                                                {{ $tenprepos11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo12 as $tenprepos12)
                                                            <td>
                                                                {{ $tenprepos12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo13 as $tenprepos13)
                                                            <td>
                                                                {{ $tenprepos13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo14 as $tenprepos14)
                                                            <td>
                                                                {{ $tenprepos14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo15 as $tenprepos15)
                                                            <td>
                                                                {{ $tenprepos15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo16 as $tenprepos16)
                                                            <td>
                                                                {{ $tenprepos16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo17 as $tenprepos17)
                                                            <td>
                                                                {{ $tenprepos17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo18 as $tenprepos18)
                                                            <td>
                                                                {{ $tenprepos18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo19 as $tenprepos19)
                                                            <td>
                                                                {{ $tenprepos19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo20 as $tenprepos20)
                                                            <td>
                                                                {{ $tenprepos20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo21 as $tenprepos21)
                                                            <td>
                                                                {{ $tenprepos21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo22 as $tenprepos22)
                                                            <td>
                                                                {{ $tenprepos22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo23 as $tenprepos23)
                                                            <td>
                                                                {{ $tenprepos23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo24 as $tenprepos24)
                                                            <td>
                                                                {{ $tenprepos24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo25 as $tenprepos25)
                                                            <td>
                                                                {{ $tenprepos25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo26 as $tenprepos26)
                                                            <td>
                                                                {{ $tenprepos26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo27 as $tenprepos27)
                                                            <td>
                                                                {{ $tenprepos27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo28 as $tenprepos28)
                                                            <td>
                                                                {{ $tenprepos28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo29 as $tenprepos29)
                                                            <td>
                                                                {{ $tenprepos29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo30 as $tenprepos30)
                                                            <td>
                                                                {{ $tenprepos30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($tenprepo31 as $tenprepos31)
                                                            <td>
                                                                {{ $tenprepos31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var ctx = document.getElementById('tentepre').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $tenprepos1 }}, {{ $tenprepos2 }}, {{ $tenprepos3 }},
                                                    {{ $tenprepos4 }}, {{ $tenprepos5 }}, {{ $tenprepos6 }},
                                                    {{ $tenprepos7 }}, {{ $tenprepos8 }}, {{ $tenprepos9 }},
                                                    {{ $tenprepos10 }},
                                                    {{ $tenprepos11 }}, {{ $tenprepos12 }}, {{ $tenprepos13 }},
                                                    {{ $tenprepos14 }}, {{ $tenprepos15 }}, {{ $tenprepos16 }},
                                                    {{ $tenprepos17 }}, {{ $tenprepos18 }}, {{ $tenprepos19 }},
                                                    {{ $tenprepos20 }},
                                                    {{ $tenprepos21 }}, {{ $tenprepos22 }}, {{ $tenprepos23 }},
                                                    {{ $tenprepos24 }}, {{ $tenprepos25 }}, {{ $tenprepos26 }},
                                                    {{ $tenprepos27 }}, {{ $tenprepos28 }}, {{ $tenprepos29 }},
                                                    {{ $tenprepos30 }},
                                                    {{ $tenprepos31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                                {{-- FIN  TENTEN PREPOS --}}

                                {{-- INICIO  REDES MIGRACION --}}


                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Redes Migracion</h5>
                                            <div style="height:276px">
                                                <canvas id="migraredes"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($migracionrede1 as $migracionredes1)
                                                            <td>
                                                                {{ $migracionredes1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede2 as $migracionredes2)
                                                            <td>
                                                                {{ $migracionredes2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede3 as $migracionredes3)
                                                            <td>
                                                                {{ $migracionredes3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede4 as $migracionredes4)
                                                            <td>
                                                                {{ $migracionredes4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede5 as $migracionredes5)
                                                            <td>
                                                                {{ $migracionredes5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede6 as $migracionredes6)
                                                            <td>
                                                                {{ $migracionredes6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede7 as $migracionredes7)
                                                            <td>
                                                                {{ $migracionredes7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede8 as $migracionredes8)
                                                            <td>
                                                                {{ $migracionredes8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede9 as $migracionredes9)
                                                            <td>
                                                                {{ $migracionredes9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede10 as $migracionredes10)
                                                            <td>
                                                                {{ $migracionredes10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede11 as $migracionredes11)
                                                            <td>
                                                                {{ $migracionredes11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede12 as $migracionredes12)
                                                            <td>
                                                                {{ $migracionredes12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede13 as $migracionredes13)
                                                            <td>
                                                                {{ $migracionredes13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede14 as $migracionredes14)
                                                            <td>
                                                                {{ $migracionredes14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede15 as $migracionredes15)
                                                            <td>
                                                                {{ $migracionredes15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede16 as $migracionredes16)
                                                            <td>
                                                                {{ $migracionredes16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede17 as $migracionredes17)
                                                            <td>
                                                                {{ $migracionredes17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede18 as $migracionredes18)
                                                            <td>
                                                                {{ $migracionredes18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede19 as $migracionredes19)
                                                            <td>
                                                                {{ $migracionredes19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede20 as $migracionredes20)
                                                            <td>
                                                                {{ $migracionredes20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede21 as $migracionredes21)
                                                            <td>
                                                                {{ $migracionredes21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede22 as $migracionredes22)
                                                            <td>
                                                                {{ $migracionredes22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede23 as $migracionredes23)
                                                            <td>
                                                                {{ $migracionredes23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede24 as $migracionredes24)
                                                            <td>
                                                                {{ $migracionredes24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede25 as $migracionredes25)
                                                            <td>
                                                                {{ $migracionredes25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede26 as $migracionredes26)
                                                            <td>
                                                                {{ $migracionredes26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede27 as $migracionredes27)
                                                            <td>
                                                                {{ $migracionredes27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede28 as $migracionredes28)
                                                            <td>
                                                                {{ $migracionredes28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede29 as $migracionredes29)
                                                            <td>
                                                                {{ $migracionredes29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede30 as $migracionredes30)
                                                            <td>
                                                                {{ $migracionredes30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($migracionrede31 as $migracionredes31)
                                                            <td>
                                                                {{ $migracionredes31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var ctx = document.getElementById('migraredes').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $migracionredes1 }}, {{ $migracionredes2 }}, {{ $migracionredes3 }},
                                                    {{ $migracionredes4 }}, {{ $migracionredes5 }}, {{ $migracionredes6 }},
                                                    {{ $migracionredes7 }}, {{ $migracionredes8 }}, {{ $migracionredes9 }},
                                                    {{ $migracionredes10 }},
                                                    {{ $migracionredes11 }}, {{ $migracionredes12 }},
                                                    {{ $migracionredes13 }}, {{ $migracionredes14 }},
                                                    {{ $migracionredes15 }}, {{ $migracionredes16 }},
                                                    {{ $migracionredes17 }}, {{ $migracionredes18 }},
                                                    {{ $migracionredes19 }}, {{ $migracionredes20 }},
                                                    {{ $migracionredes21 }}, {{ $migracionredes22 }},
                                                    {{ $migracionredes23 }}, {{ $migracionredes24 }},
                                                    {{ $migracionredes25 }}, {{ $migracionredes26 }},
                                                    {{ $migracionredes27 }}, {{ $migracionredes28 }},
                                                    {{ $migracionredes29 }}, {{ $migracionredes30 }},
                                                    {{ $migracionredes31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                                {{-- FIN  REDES MIGRACION --}}

                                {{-- INICIO  REDES PORTABILIDAD --}}


                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Redes Portabilidad</h5>
                                            <div style="height:276px">
                                                <canvas id="portabilidadrede"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($portabilidadrede1 as $portabilidadredes1)
                                                            <td>
                                                                {{ $portabilidadredes1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede2 as $portabilidadredes2)
                                                            <td>
                                                                {{ $portabilidadredes2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede3 as $portabilidadredes3)
                                                            <td>
                                                                {{ $portabilidadredes3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede4 as $portabilidadredes4)
                                                            <td>
                                                                {{ $portabilidadredes4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede5 as $portabilidadredes5)
                                                            <td>
                                                                {{ $portabilidadredes5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede6 as $portabilidadredes6)
                                                            <td>
                                                                {{ $portabilidadredes6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede7 as $portabilidadredes7)
                                                            <td>
                                                                {{ $portabilidadredes7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede8 as $portabilidadredes8)
                                                            <td>
                                                                {{ $portabilidadredes8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede9 as $portabilidadredes9)
                                                            <td>
                                                                {{ $portabilidadredes9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede10 as $portabilidadredes10)
                                                            <td>
                                                                {{ $portabilidadredes10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede11 as $portabilidadredes11)
                                                            <td>
                                                                {{ $portabilidadredes11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede12 as $portabilidadredes12)
                                                            <td>
                                                                {{ $portabilidadredes12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede13 as $portabilidadredes13)
                                                            <td>
                                                                {{ $portabilidadredes13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede14 as $portabilidadredes14)
                                                            <td>
                                                                {{ $portabilidadredes14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede15 as $portabilidadredes15)
                                                            <td>
                                                                {{ $portabilidadredes15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede16 as $portabilidadredes16)
                                                            <td>
                                                                {{ $portabilidadredes16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede17 as $portabilidadredes17)
                                                            <td>
                                                                {{ $portabilidadredes17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede18 as $portabilidadredes18)
                                                            <td>
                                                                {{ $portabilidadredes18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede19 as $portabilidadredes19)
                                                            <td>
                                                                {{ $portabilidadredes19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede20 as $portabilidadredes20)
                                                            <td>
                                                                {{ $portabilidadredes20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede21 as $portabilidadredes21)
                                                            <td>
                                                                {{ $portabilidadredes21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede22 as $portabilidadredes22)
                                                            <td>
                                                                {{ $portabilidadredes22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede23 as $portabilidadredes23)
                                                            <td>
                                                                {{ $portabilidadredes23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede24 as $portabilidadredes24)
                                                            <td>
                                                                {{ $portabilidadredes24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede25 as $portabilidadredes25)
                                                            <td>
                                                                {{ $portabilidadredes25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede26 as $portabilidadredes26)
                                                            <td>
                                                                {{ $portabilidadredes26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede27 as $portabilidadredes27)
                                                            <td>
                                                                {{ $portabilidadredes27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede28 as $portabilidadredes28)
                                                            <td>
                                                                {{ $portabilidadredes28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede29 as $portabilidadredes29)
                                                            <td>
                                                                {{ $portabilidadredes29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede30 as $portabilidadredes30)
                                                            <td>
                                                                {{ $portabilidadredes30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($portabilidadrede31 as $portabilidadredes31)
                                                            <td>
                                                                {{ $portabilidadredes31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var ctx = document.getElementById('portabilidadrede').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $portabilidadredes1 }}, {{ $portabilidadredes2 }},
                                                    {{ $portabilidadredes3 }}, {{ $portabilidadredes4 }},
                                                    {{ $portabilidadredes5 }}, {{ $portabilidadredes6 }},
                                                    {{ $portabilidadredes7 }}, {{ $portabilidadredes8 }},
                                                    {{ $portabilidadredes9 }}, {{ $portabilidadredes10 }},
                                                    {{ $portabilidadredes11 }}, {{ $portabilidadredes12 }},
                                                    {{ $portabilidadredes13 }}, {{ $portabilidadredes14 }},
                                                    {{ $portabilidadredes15 }}, {{ $portabilidadredes16 }},
                                                    {{ $portabilidadredes17 }}, {{ $portabilidadredes18 }},
                                                    {{ $portabilidadredes19 }}, {{ $portabilidadredes20 }},
                                                    {{ $portabilidadredes21 }}, {{ $portabilidadredes22 }},
                                                    {{ $portabilidadredes23 }}, {{ $portabilidadredes24 }},
                                                    {{ $portabilidadredes25 }}, {{ $portabilidadredes26 }},
                                                    {{ $portabilidadredes27 }}, {{ $portabilidadredes28 }},
                                                    {{ $portabilidadredes29 }}, {{ $portabilidadredes30 }},
                                                    {{ $portabilidadredes31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                                {{-- FIN  REDES PORTABILIDAD --}}

                                {{-- INICIO REDES PREPOST --}}


                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Redes Prepost</h5>
                                            <div style="height:276px">
                                                <canvas id="prepostrede"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($prepostrede1 as $prepostredes1)
                                                            <td>
                                                                {{ $prepostredes1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede2 as $prepostredes2)
                                                            <td>
                                                                {{ $prepostredes2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede3 as $prepostredes3)
                                                            <td>
                                                                {{ $prepostredes3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede4 as $prepostredes4)
                                                            <td>
                                                                {{ $prepostredes4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede5 as $prepostredes5)
                                                            <td>
                                                                {{ $prepostredes5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede6 as $prepostredes6)
                                                            <td>
                                                                {{ $prepostredes6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede7 as $prepostredes7)
                                                            <td>
                                                                {{ $prepostredes7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede8 as $prepostredes8)
                                                            <td>
                                                                {{ $prepostredes8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede9 as $prepostredes9)
                                                            <td>
                                                                {{ $prepostredes9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede10 as $prepostredes10)
                                                            <td>
                                                                {{ $prepostredes10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede11 as $prepostredes11)
                                                            <td>
                                                                {{ $prepostredes11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede12 as $prepostredes12)
                                                            <td>
                                                                {{ $prepostredes12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede13 as $prepostredes13)
                                                            <td>
                                                                {{ $prepostredes13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede14 as $prepostredes14)
                                                            <td>
                                                                {{ $prepostredes14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede15 as $prepostredes15)
                                                            <td>
                                                                {{ $prepostredes15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede16 as $prepostredes16)
                                                            <td>
                                                                {{ $prepostredes16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede17 as $prepostredes17)
                                                            <td>
                                                                {{ $prepostredes17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede18 as $prepostredes18)
                                                            <td>
                                                                {{ $prepostredes18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede19 as $prepostredes19)
                                                            <td>
                                                                {{ $prepostredes19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede20 as $prepostredes20)
                                                            <td>
                                                                {{ $prepostredes20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede21 as $prepostredes21)
                                                            <td>
                                                                {{ $prepostredes21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede22 as $prepostredes22)
                                                            <td>
                                                                {{ $prepostredes22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede23 as $prepostredes23)
                                                            <td>
                                                                {{ $prepostredes23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede24 as $prepostredes24)
                                                            <td>
                                                                {{ $prepostredes24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede25 as $prepostredes25)
                                                            <td>
                                                                {{ $prepostredes25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede26 as $prepostredes26)
                                                            <td>
                                                                {{ $prepostredes26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede27 as $prepostredes27)
                                                            <td>
                                                                {{ $prepostredes27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede28 as $prepostredes28)
                                                            <td>
                                                                {{ $prepostredes28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede29 as $prepostredes29)
                                                            <td>
                                                                {{ $prepostredes29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede30 as $prepostredes30)
                                                            <td>
                                                                {{ $prepostredes30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($prepostrede31 as $prepostredes31)
                                                            <td>
                                                                {{ $prepostredes31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labels = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var ctx = document.getElementById('prepostrede').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $prepostredes1 }}, {{ $prepostredes2 }}, {{ $prepostredes3 }},
                                                    {{ $prepostredes4 }}, {{ $prepostredes5 }}, {{ $prepostredes6 }},
                                                    {{ $prepostredes7 }}, {{ $prepostredes8 }}, {{ $prepostredes9 }},
                                                    {{ $prepostredes10 }},
                                                    {{ $prepostredes11 }}, {{ $prepostredes12 }}, {{ $prepostredes13 }},
                                                    {{ $prepostredes14 }}, {{ $prepostredes15 }}, {{ $prepostredes16 }},
                                                    {{ $prepostredes17 }}, {{ $prepostredes18 }}, {{ $prepostredes19 }},
                                                    {{ $prepostredes20 }},
                                                    {{ $prepostredes21 }}, {{ $prepostredes22 }}, {{ $prepostredes23 }},
                                                    {{ $prepostredes24 }}, {{ $prepostredes25 }}, {{ $prepostredes26 }},
                                                    {{ $prepostredes27 }}, {{ $prepostredes28 }}, {{ $prepostredes29 }},
                                                    {{ $prepostredes30 }},
                                                    {{ $prepostredes31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0; // or >= 1 or ...
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                                {{-- FIN REDES PREPOST --}}

                                {{-- INICIO LÍNEA RESCATE --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">LÍNEA RESCATE</h5>
                                            <div style="height:276px">
                                                <canvas id="LINEA RESCATE"></canvas>
                                                <table class="table">
                                                    <thead>

                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($linearescate1 as $linearescate_1)
                                                            <td>
                                                                {{ $linearescate_1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate2 as $linearescate_2)
                                                            <td>
                                                                {{ $linearescate_2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate3 as $linearescate_3)
                                                            <td>
                                                                {{ $linearescate_3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate4 as $linearescate_4)
                                                            <td>
                                                                {{ $linearescate_4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate5 as $linearescate_5)
                                                            <td>
                                                                {{ $linearescate_5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate6 as $linearescate_6)
                                                            <td>
                                                                {{ $linearescate_6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate7 as $linearescate_7)
                                                            <td>
                                                                {{ $linearescate_7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate8 as $linearescate_8)
                                                            <td>
                                                                {{ $linearescate_8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate9 as $linearescate_9)
                                                            <td>
                                                                {{ $linearescate_9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate10 as $linearescate_10)
                                                            <td>
                                                                {{ $linearescate_10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate11 as $linearescate_11)
                                                            <td>
                                                                {{ $linearescate_11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate12 as $linearescate_12)
                                                            <td>
                                                                {{ $linearescate_12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate13 as $linearescate_13)
                                                            <td>
                                                                {{ $linearescate_13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate14 as $linearescate_14)
                                                            <td>
                                                                {{ $linearescate_14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate15 as $linearescate_15)
                                                            <td>
                                                                {{ $linearescate_15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate16 as $linearescate_16)
                                                            <td>
                                                                {{ $linearescate_16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate17 as $linearescate_17)
                                                            <td>
                                                                {{ $linearescate_17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate18 as $linearescate_18)
                                                            <td>
                                                                {{ $linearescate_18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate19 as $linearescate_19)
                                                            <td>
                                                                {{ $linearescate_19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate20 as $linearescate_20)
                                                            <td>
                                                                {{ $linearescate_20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate21 as $linearescate_21)
                                                            <td>
                                                                {{ $linearescate_21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate22 as $linearescate_22)
                                                            <td>
                                                                {{ $linearescate_22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate23 as $linearescate_23)
                                                            <td>
                                                                {{ $linearescate_23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate24 as $linearescate_24)
                                                            <td>
                                                                {{ $linearescate_24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate25 as $linearescate_25)
                                                            <td>
                                                                {{ $linearescate_25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate26 as $linearescate_26)
                                                            <td>
                                                                {{ $linearescate_26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate27 as $linearescate_27)
                                                            <td>
                                                                {{ $linearescate_27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate28 as $linearescate_28)
                                                            <td>
                                                                {{ $linearescate_28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate29 as $linearescate_29)
                                                            <td>
                                                                {{ $linearescate_29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate30 as $linearescate_30)
                                                            <td>
                                                                {{ $linearescate_30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($linearescate31 as $linearescate_31)
                                                            <td>
                                                                {{ $linearescate_31 }}
                                                            </td>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labelsLinearescate = [
                                                        '1',
                                                        '2',
                                                        '3',
                                                        '4',
                                                        '5',
                                                        '6',
                                                        '7',
                                                        '8',
                                                        '9',
                                                        '10',
                                                        '11',
                                                        '12',
                                                        '13',
                                                        '14',
                                                        '15',
                                                        '16',
                                                        '17',
                                                        '18',
                                                        '19',
                                                        '20',
                                                        '21',
                                                        '22',
                                                        '23',
                                                        '24',
                                                        '25',
                                                        '26',
                                                        '27',
                                                        '28',
                                                        '29',
                                                        '30',
                                                        '31',

                                                    ];
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('LINEA RESCATE').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labelsLinearescate,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $linearescate_1 }}, {{ $linearescate_2 }}, {{ $linearescate_3 }},
                                                    {{ $linearescate_4 }}, {{ $linearescate_5 }}, {{ $linearescate_6 }},
                                                    {{ $linearescate_7 }}, {{ $linearescate_8 }}, {{ $linearescate_9 }},
                                                    {{ $linearescate_10 }}, {{ $linearescate_11 }}, {{ $linearescate_12 }},
                                                    {{ $linearescate_13 }}, {{ $linearescate_14 }}, {{ $linearescate_15 }},
                                                    {{ $linearescate_16 }}, {{ $linearescate_17 }}, {{ $linearescate_18 }},
                                                    {{ $linearescate_19 }}, {{ $linearescate_20 }}, {{ $linearescate_21 }},
                                                    {{ $linearescate_22 }}, {{ $linearescate_23 }}, {{ $linearescate_24 }},
                                                    {{ $linearescate_25 }}, {{ $linearescate_26 }}, {{ $linearescate_27 }},
                                                    {{ $linearescate_28 }}, {{ $linearescate_29 }}, {{ $linearescate_30 }},
                                                    {{ $linearescate_31 }},
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 87, 87, 0.5)',
                                                    'rgba(255, 198, 87, 0.7)',
                                                    'rgba(87, 255, 87, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(255, 87, 183, 0.5)',
                                                    'rgba(87, 250, 255, 0.7)',
                                                    'rgba(87, 255, 129, 0.6)',
                                                    'rgba(87, 178, 255, 0.5)',
                                                    'rgba(162, 87, 255, 0.5)',
                                                    'rgba(87, 144, 255, 0.6)',
                                                    'rgba(255, 255, 87, 0.6)',
                                                    'rgba(87, 255, 95, 0.7)',
                                                    'rgba(158, 247, 125, 0.6)',
                                                    'rgba(255, 139, 87, 0.5)',
                                                    'rgba(158, 247, 125, 0.7)',
                                                    'rgba(255, 236, 53, 0.5)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(255, 244, 111, 0.5)',
                                                    'rgba(56, 53, 255, 0.6)',
                                                    'rgba(255, 184, 111, 0.7)',
                                                    'rgba(140, 255, 53, 0.5)',
                                                    'rgba(247, 201, 125, 0.7)',
                                                    'rgba(255, 168, 53, 0.5)',
                                                    'rgba(114, 111, 255, 0.7)',
                                                    'rgba(128, 255, 53, 0.5)',
                                                    'rgba(53, 255, 190, 0.6)',
                                                    'rgba(125, 247, 207, 0.7)',
                                                    'rgba(213, 247, 125, 0.7)',
                                                    'rgba(202, 111, 255, 0.7)',
                                                    'rgba(125, 183, 247, 0.5)',
                                                    'rgba(255, 175, 242, 0.6)',
                                                ],
                                                borderColor: [

                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0;
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>
                                {{-- FIN LINEA RESCATE --}}

                                {{-- INICIO SERVICIO AL CLIENTE --}}
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">SERVICIO AL CLIENTE</h5>
                                            <div style="height:276px">
                                                <canvas id="SERVICIO CLIENTE"></canvas>
                                                <table class="table">
                                                    <thead>
                                                    </thead>
                                                    <tbody style="text-align: center" hidden>
                                                        @foreach ($serviciocliente1 as $serviciocliente_1)
                                                            <td>
                                                                {{ $serviciocliente_1 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente2 as $serviciocliente_2)
                                                            <td>
                                                                {{ $serviciocliente_2 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente3 as $serviciocliente_3)
                                                            <td>
                                                                {{ $serviciocliente_3 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente4 as $serviciocliente_4)
                                                            <td>
                                                                {{ $serviciocliente_4 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente5 as $serviciocliente_5)
                                                            <td>
                                                                {{ $serviciocliente_5 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente6 as $serviciocliente_6)
                                                            <td>
                                                                {{ $serviciocliente_6 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente7 as $serviciocliente_7)
                                                            <td>
                                                                {{ $serviciocliente_7 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente8 as $serviciocliente_8)
                                                            <td>
                                                                {{ $serviciocliente_8 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente9 as $serviciocliente_9)
                                                            <td>
                                                                {{ $serviciocliente_9 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente10 as $serviciocliente_10)
                                                            <td>
                                                                {{ $serviciocliente_10 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente11 as $serviciocliente_11)
                                                            <td>
                                                                {{ $serviciocliente_11 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente12 as $serviciocliente_12)
                                                            <td>
                                                                {{ $serviciocliente_12 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente13 as $serviciocliente_13)
                                                            <td>
                                                                {{ $serviciocliente_13 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente14 as $serviciocliente_14)
                                                            <td>
                                                                {{ $serviciocliente_14 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente15 as $serviciocliente_15)
                                                            <td>
                                                                {{ $serviciocliente_15 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente16 as $serviciocliente_16)
                                                            <td>
                                                                {{ $serviciocliente_16 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente17 as $serviciocliente_17)
                                                            <td>
                                                                {{ $serviciocliente_17 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente18 as $serviciocliente_18)
                                                            <td>
                                                                {{ $serviciocliente_18 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente19 as $serviciocliente_19)
                                                            <td>
                                                                {{ $serviciocliente_19 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente20 as $serviciocliente_20)
                                                            <td>
                                                                {{ $serviciocliente_20 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente21 as $serviciocliente_21)
                                                            <td>
                                                                {{ $serviciocliente_21 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente22 as $serviciocliente_22)
                                                            <td>
                                                                {{ $serviciocliente_22 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente23 as $serviciocliente_23)
                                                            <td>
                                                                {{ $serviciocliente_23 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente24 as $serviciocliente_24)
                                                            <td>
                                                                {{ $serviciocliente_24 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente25 as $serviciocliente_25)
                                                            <td>
                                                                {{ $serviciocliente_25 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente26 as $serviciocliente_26)
                                                            <td>
                                                                {{ $serviciocliente_26 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente27 as $serviciocliente_27)
                                                            <td>
                                                                {{ $serviciocliente_27 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente28 as $serviciocliente_28)
                                                            <td>
                                                                {{ $serviciocliente_28 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente29 as $serviciocliente_29)
                                                            <td>
                                                                {{ $serviciocliente_29 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente30 as $serviciocliente_30)
                                                            <td>
                                                                {{ $serviciocliente_30 }}
                                                            </td>
                                                        @endforeach
                                                        @foreach ($serviciocliente31 as $serviciocliente_31)
                                                            <td>
                                                                {{ $serviciocliente_31 }}
                                                            </td>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <script>
                                                    const labelsServicioCliente = [
                                                        '1', '2', '3', '4', '5', '6', '7', '8', '9', '10',
                                                        '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                        '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'
                                                    ];
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    var ctx = document.getElementById('SERVICIO CLIENTE').getContext('2d');
                                    var myPieChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labelsServicioCliente,
                                            datasets: [{
                                                label: '',
                                                data: [{{ $serviciocliente_1 }}, {{ $serviciocliente_2 }},
                                                    {{ $serviciocliente_3 }},
                                                    {{ $serviciocliente_4 }}, {{ $serviciocliente_5 }},
                                                    {{ $serviciocliente_6 }},
                                                    {{ $serviciocliente_7 }}, {{ $serviciocliente_8 }},
                                                    {{ $serviciocliente_9 }},
                                                    {{ $serviciocliente_10 }}, {{ $serviciocliente_11 }},
                                                    {{ $serviciocliente_12 }},
                                                    {{ $serviciocliente_13 }}, {{ $serviciocliente_14 }},
                                                    {{ $serviciocliente_15 }},
                                                    {{ $serviciocliente_16 }}, {{ $serviciocliente_17 }},
                                                    {{ $serviciocliente_18 }},
                                                    {{ $serviciocliente_19 }}, {{ $serviciocliente_20 }},
                                                    {{ $serviciocliente_21 }},
                                                    {{ $serviciocliente_22 }}, {{ $serviciocliente_23 }},
                                                    {{ $serviciocliente_24 }},
                                                    {{ $serviciocliente_25 }}, {{ $serviciocliente_26 }},
                                                    {{ $serviciocliente_27 }},
                                                    {{ $serviciocliente_28 }}, {{ $serviciocliente_29 }},
                                                    {{ $serviciocliente_30 }},
                                                    {{ $serviciocliente_31 }}
                                                ],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.5)',
                                                    'rgba(54, 162, 235, 0.5)',
                                                    'rgba(255, 206, 86, 0.5)',
                                                    'rgba(255, 159, 64, 0.5)',
                                                    'rgba(75, 192, 192, 0.5)',
                                                    'rgba(153, 102, 255, 0.5)',
                                                    'rgba(255, 159, 243, 0.5)',
                                                    'rgba(100, 206, 86, 0.5)',
                                                    'rgba(255, 99, 71, 0.5)',
                                                    'rgba(147, 112, 219, 0.5)',
                                                    'rgba(255, 182, 193, 0.5)',
                                                    'rgba(119, 136, 153, 0.5)',
                                                    'rgba(255, 127, 80, 0.5)',
                                                    'rgba(186, 85, 211, 0.5)',
                                                    'rgba(255, 215, 0, 0.5)',
                                                    'rgba(30, 144, 255, 0.5)',
                                                    'rgba(255, 105, 180, 0.5)',
                                                    'rgba(0, 206, 209, 0.5)',
                                                    'rgba(255, 140, 0, 0.5)',
                                                    'rgba(138, 43, 226, 0.5)',
                                                    'rgba(127, 255, 212, 0.5)',
                                                    'rgba(255, 20, 147, 0.5)',
                                                    'rgba(65, 105, 225, 0.5)',
                                                    'rgba(255, 250, 205, 0.5)',
                                                    'rgba(220, 20, 60, 0.5)',
                                                    'rgba(0, 255, 127, 0.5)',
                                                    'rgba(255, 0, 255, 0.5)',
                                                    'rgba(106, 90, 205, 0.5)',
                                                    'rgba(255, 165, 0, 0.5)',
                                                    'rgba(70, 130, 180, 0.5)',
                                                    'rgba(255, 192, 203, 0.5)'
                                                ],
                                                borderWidth: 0
                                            }]
                                        },
                                        plugins: [ChartDataLabels],
                                        options: {
                                            scales: {
                                                xAxes: [{
                                                    barPercentage: 1.1,
                                                }]
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true
                                                },
                                                datalabels: {
                                                    display: function(context) {
                                                        return context.dataset.data[context.dataIndex] !== 0;
                                                    },
                                                    color: 'black',
                                                    anchor: 'end',
                                                    align: 'end',
                                                    rotation: -45,
                                                    padding: {
                                                        top: -30
                                                    },
                                                    font: {
                                                        size: 12,
                                                    }
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                                {{-- FIN SERVICIO AL CLIENTE  --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
