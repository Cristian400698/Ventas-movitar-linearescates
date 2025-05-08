@extends('layouts.main', ['activePage' => 'marketing', 'titlePage' => 'Marketing'])
@section('content')
    <div class="container">
        <div class="pull-right">
            <div class="col-md-12">
                <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                    <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);padding-bottom: 25px;">
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">Marketing</h3>
                        <br>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                            title="Inbound" style="margin-left: 40px">
                            <a href="{{ url('/markephoenix/create') }}" style="color: #EAF2F8;font-size:12px">
                                Phoenix
                            </a>
                        </button>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right"
                            title="Digital" style="margin-left: 40px">
                            <a href="{{ url('/markefija/create') }}" style="color: #EAF2F8;font-size:12px">
                                Fija
                            </a>
                        </button>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Televentas" style="margin-left: 40px ">
                            <a href="{{ url('/markeportabilidad/create') }}" style="color: #EAF2F8;font-size:12px">
                                Portabilidad
                            </a>
                        </button>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right"
                            title="Digital" style="margin-left: 40px">
                            <a href="{{ url('/markeprepos/create') }}" style="color: #EAF2F8;font-size:12px">
                                Prepos
                            </a>
                        </button>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Televentas" style="margin-left: 40px ">
                            <a href="{{ url('/markeupgrade/create') }}" style="color: #EAF2F8;font-size:12px">
                                Upgrade
                            </a>
                        </button>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                        title="Televentas" style="margin-left: 40px ">
                        <a href="{{ url('/markedigital/create') }}" style="color: #EAF2F8;font-size:12px">
                            Digital
                        </a>
                    </button>

                    </center>

                    {{-- <center>

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                            title="Inbound" style="margin-left: 40px">
                            <a href="{{ url('/markephoenix') }}" style="color: #EAF2F8;font-size:12px">
                                Mis ventas Phoenix
                            </a>
                        </button>

                    </center> --}}
                    <br><br><br><br>
                    <center>
                        @can('Back')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                            title="Inbound" style="margin-left: 40px">
                            <a href="{{ url('/markephoenix') }}" style="color: #EAF2F8;font-size:12px">
                                Phoenix Back
                            </a>
                        </button>
                        @endcan
                        @can('Back')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right"
                            title="Digital" style="margin-left: 40px">
                            <a href="{{ url('/markefija') }}" style="color: #EAF2F8;font-size:12px">
                                Fija Back
                            </a>
                        </button>
                        @endcan
                        @can('Back')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Televentas" style="margin-left: 40px ">
                            <a href="{{ url('/markeportabilidad') }}" style="color: #EAF2F8;font-size:12px">
                                Portabilidad Back
                            </a>
                        </button>
                        @endcan
                        @can('Back')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right"
                            title="Digital" style="margin-left: 40px">
                            <a href="{{ url('/markeprepos') }}" style="color: #EAF2F8;font-size:12px">
                                Prepos Back
                            </a>
                        </button>
                        @endcan
                        @can('Back')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Televentas" style="margin-left: 40px ">
                            <a href="{{ url('/markeupgrade') }}" style="color: #EAF2F8;font-size:12px">
                                Upgrade Back
                            </a>
                        </button>
                        @endcan

                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                            title="Televentas" style="margin-left: 40px ">
                            <a href="{{ url('/markedigital') }}" style="color: #EAF2F8;font-size:12px">
                                Digital Back
                            </a>
                        </button>
                    </center>
                    <br><br><br><br>
                    <center>
                        @can('Super')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                            title="Inbound" style="margin-left: 40px">
                            <a href="{{ url('/phoenixmarkperdida') }}" style="color: #EAF2F8;font-size:12px">
                                Phoenix perdidas
                            </a>
                        </button>
                        @endcan
                        @can('Super')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                            title="Inbound" style="margin-left: 40px">
                            <a href="{{ url('/markefijaperdida') }}" style="color: #EAF2F8;font-size:12px">
                                Fija perdidas
                            </a>
                        </button>
                        @endcan
                        @can('Super')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                            title="Inbound" style="margin-left: 40px">
                            <a href="{{ url('/markeportabilidadperdida') }}" style="color: #EAF2F8;font-size:12px">
                                Portabilidad perdidas
                            </a>
                        </button>
                        @endcan
                        @can('Super')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top"
                            title="Inbound" style="margin-left: 40px">
                            <a href="{{ url('/markepreposperdida') }}" style="color: #EAF2F8;font-size:12px">
                                Prepost perdidas
                            </a>
                        </button>
                        @endcan
                    </center>
                @endsection
