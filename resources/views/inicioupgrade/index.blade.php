@extends('layouts.main', ['activePage' => 'Upgrade', 'titlePage' => 'Upgrade'])
@section('content')
    <div class="container">
        <div class="pull-right">
            <div class="col-md-12">
                <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                    </body>
                    <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);padding-bottom: 25px;">
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">UPGRADE</h3>
                        <br>
                        @can('Asesor-inboun')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                                title="Inbound" style="margin-left: 40px">
                                <a href="{{ url('/upgradeinbo/create')}}" style="color: #EAF2F8;font-size:12px">Inbound</a> 
                            </button>
                        @endcan
                        @can('Asesor-digital')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right"
                                title="Digital" style="margin-left: 40px">
                                <a href="{{ url('/upgradedigi/create')}}" style="color: #EAF2F8;font-size:12px">Digital</a> 
                            </button>
                        @endcan
                        @can('asesor-televenta')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Televentas" style="margin-left: 40px ">
                                <a href="{{ url('/upgradetelev/create')}}" style="color: #EAF2F8;font-size:12px">Televentas</a>
                            </button>
                        @endcan
                    </center>
                    <br><br><br><br>
                    <center>
                        @can('Asesor-inboun')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="estadoupgradeinbound" style="color: #EAF2F8;font-size:12px">Mis ventas INBOUND</a> 
                        </button>
                        @endcan
                        @can('Asesor-digital')

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="estadoupgradedigital" style="color: #EAF2F8;font-size:12px">Mis ventas DIGITAL</a>
                        </button>
                        @endcan
                        @can('asesor-televenta')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="estadoupgradeteleventa" style="color: #EAF2F8;font-size:12px">Mis ventas TELEVENTAS</a>
                        </button>
                        @endcan

                    </center>
                    <br><br><br><br>
                    <center>

                        @can('back-inbound')
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/upgradeinbo/index')}}" style="color: #EAF2F8;font-size:12px">Backoffice Inbound</a>
                            </button>
                        @endcan

                        @can('back-digital')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="{{ url('/upgradedigi/index')}}" style="color: #EAF2F8;font-size:12px">Backoffice Digital</a>
                        </button>
                    @endcan

                    @can('back-televanta')
                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                        title="Backoffice" style="margin-left: 40px ">
                        <a href="{{ url('/upgradetelev/index')}}" style="color: #EAF2F8;font-size:12px">Backoffice Televentas</a>
                    </button>
                    @endcan
                </center>
                <br><br><br><br>
                <center>

                    @can('supervisor-inbound')
                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                        title="Backoffice" style="margin-left: 40px ">
                        <a href="perdidaupgradeinbound" style="color: #EAF2F8;font-size:12px">Perdidas Inbound</a>
                    </button>
                    @endcan

                    @can('supervisor-digital')
                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                        title="Backoffice" style="margin-left: 40px ">
                        <a href="perdidaupgradedigital" style="color: #EAF2F8;font-size:12px">Perdidas Digital</a>
                    </button>
                    @endcan

                    @can('supervisor-televenta')
                    <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                        title="Backoffice" style="margin-left: 40px ">
                        <a href="perdidaupgradeteleventa" style="color: #EAF2F8;font-size:12px">Perdidas Televentas</a>
                    </button>
                    @endcan
                    </center>
                    </body>
                @endsection
