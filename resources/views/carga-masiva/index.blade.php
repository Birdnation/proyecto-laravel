@extends('layouts.app')

@section('content')



<div class="container">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fas fa-users"></i>
            </div>
            <div class="col-lg-12 login-title">
                CARGA MASIVA
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form id="formulario" method="POST" action="{{ route('cargaExcel') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" id="groupAdjunto">
                            <label class="form-control-label">ADJUNTAR ARCHIVO</label>
                            <input id="adjunto" type="file" class="form-control @error('adjunto') is-invalid @enderror"
                                name="adjunto">

                            @error('adjunto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button id="boton" class="btn btn-outline-primary">{{ __('Subir') }}</button>
                            </div>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row">
                            <div class="col @if (!$errores)
                                col-12 @else col-6
                            @endif">

                                @if ($nuevos)
                                <h1 class="text-white">Alumnos agregados</h1>
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fila</th>
                                            <th scope="col">Nombre de Alumno</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($nuevos as $key => $value)
                                        <tr>
                                            <td class="table-success text-black">{{$key}}</td>
                                            <td class="table-success text-black">{{$value->name}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                            <div class="col @if (!$nuevos)
                                col-12 @else col-6
                            @endif">

                                @if ($errores)
                                <h1 class="text-white">Alumnos No agregados</h1>
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fila</th>
                                            <th scope="col">Errores</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($errores as $key => $value)
                                        @if ($value)
                                        <tr>
                                            <td class="table-danger text-black">{{$key}}</td>
                                            @foreach ($value as $newKey => $error)
                                            <td class="table-danger text-black">{{$error[0]}}</td>

                                            @endforeach
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
    @endsection
