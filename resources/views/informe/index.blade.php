@extends('layouts.main', ['activePage' => 'informe', 'titlePage' => 'Informe Ventas'])
@section('content')
<div class="content" style="margin-bottom: -159px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="row">
                                        </div>
                                    </div>
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title" style="text-align: center;">General</h4>
                                    </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <form action="/informe/import" method="post" enctype="multipart/form-data">
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
                                    </div> <br>
                                    {{--  --}}
                                     <div class="card-header card-header-info">
                                        <h4 class="card-title" style="text-align: center;">1-4</h4>
                                    </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <form action="/info14/import" method="post" enctype="multipart/form-data">
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
                                    <br>
                                    {{--  --}}
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title" style="text-align: center;">2-4</h4>
                                    </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <form action="/info24/import" method="post" enctype="multipart/form-data">
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
                                    <br>
                                    {{--  --}}
                                     <div class="card-header card-header-info">
                                        <h4 class="card-title" style="text-align: center;">3-4</h4>
                                    </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <form action="/info34/import" method="post" enctype="multipart/form-data">
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
                                    <br>
                                    {{--  --}}
                                     <div class="card-header card-header-info">
                                        <h4 class="card-title" style="text-align: center;">4-4</h4>
                                    </div>
                                    <div class="card-footer ml-auto mr-auto">
                                        <form action="/info44/import" method="post" enctype="multipart/form-data">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection