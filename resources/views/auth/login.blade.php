@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                INICIO SESIÓN
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">RUT USUARIO</label>
                            <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="rut" autofocus>

                                @error('rut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">CONTRASEÑA</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-outline-primary">ACCEDER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>

    @endsection
