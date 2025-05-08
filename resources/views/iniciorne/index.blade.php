@extends('layouts.main', ['activePage' => 'comunidad', 'titlePage' => ''])
@section('content')
    <div class="container">
        <div class="pull-right">
            <div class="col-md-12">
                <div class="card" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
                    </body>
                    <center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);padding-bottom: 25px;">
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                        <h3 aline="center">RNE - #791</h3>
                        <br>
                        
                        
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Televentas" style="margin-left: 40px ">
                                <a href="{{ url('/comunidad/create')}}" style="color: #EAF2F8;font-size:12px">Ventas</a>
                            </button>
                        
                    </center>
                    <br><br><br><br>
                <center>                                      
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                            title="Backoffice" style="margin-left: 40px ">
                            <a href="{{ url('/estadoscomunidad') }}" style="color: #EAF2F8;font-size:12px">Mis ventas
                                TELEVENTAS</a>
                        </button>.
                    
                    </center>
                    <br><br><br><br>
                  <center>

                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="{{ url('/comunidad/index') }}" style="color: #EAF2F8;font-size:12px">Backoffice</a>
                            </button>
                        

                    </center>
                    <br><br><br><br>
                    <center>

                    
                            <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left"
                                title="Backoffice" style="margin-left: 40px ">
                                <a href="perdidacomunidad" style="color: #EAF2F8;font-size:12px">Perdidas</a>
                            </button>
                        
                    </center>
                    </body>
                @endsection
