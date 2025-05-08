@extends('layouts.main', ['activePage' => 'RedesSociales', 'titlePage' => 'Redes Sociales'])
@section('content')
    <div class="container">
        <div class="pull-right">
            <div class="col-md-12">
                <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                    </body>
                    <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);padding-bottom: 25px;">
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">Redes Sociales</h3>
                        <br>
                        @can('Asesor-inboun')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Inbound" style="margin-left: 40px">
                                <a href="{{ url('/portabilidadredes/create')}}" style="color: #EAF2F8;font-size:12px">Portabilidad</a>
                            </button>
                        @endcan
                        @can('Asesor-digital')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right"
                                title="Digital" style="margin-left: 40px">
                                <a href="{{ url('/migracionredes/create')}}" style="color: #EAF2F8;font-size:12px">Migración</a>
                            </button>
                        @endcan
                        
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Televentas" style="margin-left: 40px ">
                                <a href="{{ url('/prepostredes/create')}}" style="color: #EAF2F8;font-size:12px">Prepos</a>
                            </button>
                        
                    </center>
                    <br><br><br><br>
                <center>
                    @can('Asesor-inboun') 
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="portabilidadredesventas" style="color: #EAF2F8;font-size:12px">Mis ventas Portabilidad</a>
                        </button>
                    @endcan
                    @can('Asesor-digital')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="migracionredesventas" style="color: #EAF2F8;font-size:12px">Mis ventas Migración</a>
                        </button>
                    @endcan
                    
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="prepostredesventas" style="color: #EAF2F8;font-size:12px">Mis ventas Prepos</a>
                        </button>.
                    
                    </center>
                    <br><br><br><br>
                  <center>

                        @can('back-inbound')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/portabilidadredes')}}" style="color: #EAF2F8;font-size:12px">Backoffice Portabilidad</a>
                            </button>
                        @endcan

                        @can('back-digital')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/migracionredes')}}" style="color: #EAF2F8;font-size:12px">Backoffice Migración</a>
                            </button>
                        @endcan

                     
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/prepostredes')}}" style="color: #EAF2F8;font-size:12px">Backoffice Prepos</a>
                            </button>
                        

                    </center>
                    <br><br><br><br>
                    <center>

                        @can('supervisor-inbound')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/portabilidadredesperdidas')}}" style="color: #EAF2F8;font-size:12px">Perdidas Portabilidad</a>
                            </button>
                        @endcan

                        @can('supervisor-digital')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/migracionredesperdidas')}}" style="color: #EAF2F8;font-size:12px">Perdidas Migración</a>
                            </button>
                        @endcan

                        
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/prepostredesperdidas')}}" style="color: #EAF2F8;font-size:12px">Perdidas Prepos</a>
                            </button>
                        
                    </center>
                    <br><br><br>
                    
                    </body>
                @endsection
