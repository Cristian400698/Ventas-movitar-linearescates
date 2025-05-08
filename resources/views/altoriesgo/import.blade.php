@extends('layouts.main', ['activePage' => 'altoriesgo', 'titlePage' => ''])
@section('content')
    <div class="content" style="margin-bottom: -159px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   {{--  <center>
                        <img src="{{ asset('img/pngegg.png') }}" float="left" height="120" width="300">
                    </center> --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header card-header-info">
                                            <h4 class="card-title" style="text-align: center;">Importar Datos</h4>
                                        </div>
                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <div class="row">
                                            </div>
                                        </div>
                                        <div class="card-footer ml-auto mr-auto">
                                            <form action="/altoriesgo/import" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="custom-file">
                                                            <input type="file" name="file" class="form-control" id="file">
                                                        </div>
                                                        <div class="mt-3" style="margin-left:100px">
                                                            <button type="submit" class="btn btn-info">Importar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
