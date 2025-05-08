@extends('layouts.main', ['activePage' => 'porta', 'titlePage' => 'Portabilidad'])
@section('content')
    <div class="container">
        <div class="pull-right">
            <div class="col-md-12">
                <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                    </body>
                    <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">PORTABILIDAD</h3>
                        <br>
                        @can('INBOUND')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Inbound" style="margin-left: 40px">
                                <a href="{{ url('/porta/create')}}" style="color: #EAF2F8;font-size:12px">Inbound</a>
                            </button>
                        @endcan
                        @can('DIGITAL')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right"
                                title="Digital" style="margin-left: 40px">
                                <a href="{{ url('/portadigital/create')}}" style="color: #EAF2F8;font-size:12px">Digital</a> 
                            </button>
                        @endcan
                        @can('TELEVENTAS')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Televentas" style="margin-left: 40px ">
                                <a href="{{ url('/portatelev/create')}}" style="color: #EAF2F8;font-size:12px">Televentas</a>
                            </button>
                        @endcan
                    </center>
                    <br><br><br><br>
                    <center>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="{{ url('/estados')}}" style="color: #EAF2F8;font-size:12px">Mis ventas INBOUND</a> 
                        </button>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="{{ url('/estadosportdigi')}}" style="color: #EAF2F8;font-size:12px">Mis ventas DIGITAL</a>
                        </button>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="{{ url('/estadosportatelev')}}" style="color: #EAF2F8;font-size:12px">Mis ventas TELEVENTAS</a>
                        </button>


                    </center>
                    <br><br><br><br>
                    <center>

                        @can('Back-Office-Inbound')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/porta/index')}}" style="color: #EAF2F8;font-size:12px">Backoffice Inbound</a>
                            </button>
                        @endcan

                        @can('Back-Office-Digital')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="{{ url('/portadigital/index')}}" style="color: #EAF2F8;font-size:12px">Backoffice Digital</a>
                        </button>
                    @endcan

                    @can('Back-Office-Televentas')
                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                        title="Backoffice" style="margin-left: 40px ">
                        <a href="{{ url('/portatelev/index')}}" style="color: #EAF2F8;font-size:12px">Backoffice Televentas</a>
                    </button>
                    @endcan

                </center>
                <br><br><br><br>
                <center>

                    @can('Perdidas')
                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                        title="Backoffice" style="margin-left: 40px ">
                        <a href="perdidaportainbound" style="color: #EAF2F8;font-size:12px">Perdidas Inbound</a>
                    </button>
                    @endcan

                    @can('Perdidas')
                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                        title="Backoffice" style="margin-left: 40px ">
                        <a href="perdidaportadigital" style="color: #EAF2F8;font-size:12px">Perdidas Digital</a>
                    </button>
                    @endcan

                    @can('Perdidas')
                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                        title="Backoffice" style="margin-left: 40px ">
                        <a href="perdidaportateleventas" style="color: #EAF2F8;font-size:12px">Perdidas Televentas</a>
                    </button>
                    @endcan
                    </center>
                    </body>
                @endsection
