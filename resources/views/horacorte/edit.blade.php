@extends('layouts.main', ['activePage' => 'supervisor', 'titlePage' => 'Supervisor Personal'])
@section('content')

<h3 align="center">Personal de Supervisor {{ Auth::user()->name }}</h3>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        
                    {{-- sections ver personal administrado --}}
                    <div class="row">
                        <div class="col-12 text-right">
                            @can('user_create')
                                <a href="{{ route('superpersonal.edit','1') }}" class="btn btn-sm btn-facebook">VER PERSONAL</a>
                            @endcan
                        </div> 
                    </div>
                    <div>
                        <form action="/superpersonal" >
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
                        <input type="submit" id="butonmes"  hidden>
                        <script>
                           function selecionmes(){
                                const mes = document.getElementById('mes').value
                                $("#butonmes").click();
                            }
                        </script>
                     </form>
                    </div>
                        <div class="row">
                            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js" integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


                            {{-- INICO DASH POR DIA --}}

                            
                            {{-- Inicio supervisor general vista --}}
                                        <div class="card">
                                    <div class="card-body">
                                        @if ($mes == '')
                                        <h5 class="card-title">Ventas de mi personal</h5>
                                        @else 
                                        <h5 class="card-title">Ventas de mi personal: mes {{$mes}}</h5>
                                        @endif
                                  
                                    <canvas id="ventasasesor" style="display: block; width: 100%; height: 600px"></canvas>
                                </div>
                            </div>
                            {{-- Fin Supervisor general vista --}}
                            
                              {{--  @can('desacarga') --}}
                              
                    <div>
                        <form action="/superpersonal" >
                       
                     </form>
                    </div>
                              <form action=" {{route('superpersonal.excel')}} ">
                                <select name="campaña" id="campaña" onChange="selecioncampaña()">
                                    <option value="btnblock">Selecione Una Campaña</option>
                                    <option value="portainbound">Portabilidad Inbound</option>
                                    <option value="portadigi">Portabilidad Digital</option>
                                    <option value="portatelev">Porta televentas</option>
                                    <option value="upgradeinbo">Upgrade Inbound</option>
                                    <option value="upgradedigi">Upgrade Digital</option>
                                    <option value="upgradetelev">Upgrade Televentas</option>
                                    <option value="preposinbo">Prepost Inbound</option>
                                    <option value="preposdigi">Prepost Digital</option>
                                    <option value="prepostelev">Prepost Televentas</option>
                                    <option value="fijainbo">Fija Inbound</option>
                                    <option value="fijadigi">Fija Digital</option>
                                    <option value="fijatelev">Fija Televentas</option>
                                    <option value="lineanueva">Linea Nueva</option>
                                    <option value="phoenix">Phoenix</option>
                                    <option value="rechazos">Rechazos</option>
                                </select>
                                <script>
                                    function selecioncampaña() {
                                    const btnblock = document.getElementById('btnblock');
                                    const campaña = document.getElementById('campaña').value;
                                    if (campaña == 'btnblock') {
                                        btnblock.disabled = true; 
                                    } else {
                                        btnblock.disabled = false; 
                                    }
                                    }
                                </script>
                                <input type="hidden" name="mes" id="" value="{{$mes}}">
                                <button id="btnblock" type="submit" class="btn btn-info" style="border-radius: 10px; margin-left:20px;" disabled><i
                                    class="material-icons" >file_download</i>Generar Informe</button>
                            </form>

                            {{-- @endcan --}}

                        </div>

                             {{-- INICIO supervisor general --}}

                            @push('js')   
                            <script>
                                   $(document).ready(function() {
      const datajs = JSON.parse(`<?php echo $dataportainbound ?>`)
          var ctx = document.getElementById('ventasasesor').getContext('2d');

          const myChart = new Chart(ctx, {
              type: 'bar',
              data:{
                  labels: datajs.label,
                  datasets:[{
                      label: 'portabilida Inbound', 
                      backgroundColor: 'rgba(19, 56, 241)',
                      borderWithe: 1,
                      data: datajs.dashsuper,
                  },{
                      label: 'Portabilidad Digital', 
                      data: datajs.dashsuperdigital,
                       backgroundColor: 'rgba(90, 118, 255)',
                  borderWithe: 1
                  },{
                      label: 'Portabilidad Televentas', 
                      data: datajs.dashsuperportatelev,
                       backgroundColor: 'rgba(28, 159, 255)',
                  borderWithe: 1
                  },{
                      label: 'Upgrade Inbound', 
                      data: datajs.dashsuperupgradeinbo,
                       backgroundColor: 'rgba(255, 66, 28)',
                  borderWithe: 1
                  },{
                      label: 'Upgrade Digital', 
                      data: datajs.dashsuperupgradedigi,
                       backgroundColor: 'rgba(255, 117, 28)',
                  borderWithe: 1
                  },{
                      label: 'Upgrade Televentas', 
                      data: datajs.dashsuperupgradetelev,
                       backgroundColor: 'rgba(254, 102, 78)',
                  borderWithe: 1
                  },{
                      label: 'Prepost Inbound', 
                      data: datajs.dashsuperprepostinbound,
                       backgroundColor: 'rgba(149, 255, 30)',   
                  borderWithe: 1
                  },{
                      label: 'Prepost Digital', 
                      data: datajs.dashsuperprepostdigital,
                       backgroundColor: 'rgba(54, 255, 30)',
                  borderWithe: 1
                  },{
                      label: 'Prepost Televentas', 
                      data: datajs.dashsuperpreposteleventa,
                       backgroundColor: 'rgba(74, 255, 118)',
                  borderWithe: 1
                  },{
                      label: 'Fija Inbound', 
                      data: datajs.dashsuperfijainbound,
                       backgroundColor: 'rgba(0, 255, 19)',
                  borderWithe: 1
                  },{
                      label: 'Fija Digital', 
                      data: datajs.dashsuperfijadigital,
                       backgroundColor: 'rgba(219, 255, 74)',
                  borderWithe: 1
                  },{
                      label: 'Fija Televentas', 
                      data: datajs.dashsuperfijateleventa,
                       backgroundColor: 'rgba(186, 255, 74)',
                  borderWithe: 1
                  }]
              },
             
        options: {
            scales: {
            yAxes: [{

              ticks: {
                fontColor: "#9f9f9f",
                beginAtZero: false,
                maxTicksLimit: 50,
                //padding: 20
              },

            }],

            xAxes: [{
              barPercentage: 1.1,
            }]
          },

        },
          });
      });
                </script>
                            {{-- FIN Supervisor general --}}
                    </div>
                        </div>
                    </div>
        </div>
    </div>
</div>

@endpush
@endsection
