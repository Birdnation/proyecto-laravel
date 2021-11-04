@extends('layouts.app')

@section('content')
    @if (Auth::user()->rol == 'Administrador')
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8 login-box">
                    <div class="col-lg-12 login-key">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="col-lg-12 login-title">
                        EDITAR CARRERA
                    </div>

                    <div class="col-lg-12 login-form">
                        <div class="col-lg-12 login-form">
                            <form method="POST"
                                action="{{ route('carrera.update', [$carrera]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-control-label">CÓDIGO</label>
                                    <input value={{ $carrera->codigo }}
                                        id="codigo"
                                        type="text"
                                        class="form-control @error('codigo') is-invalid @enderror"
                                        name="codigo"
                                        required>

                                    @error('codigo')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">NOMBRE</label>
                                    <input value="{{ $carrera->nombre }}"
                                        id="nombre"
                                        type="text"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        name="nombre"
                                        required>

                                    @error('nombre')
                                        <span class="invalid-feedback"
                                            role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 py-3">
                                    <div class="col-lg-12 text-center">
                                        <button type="submit"
                                            class="btn btn-outline-primary">{{ __('Editar') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-2"></div>
                </div>
            </div>
        @else
            @php
                header('Location: /home');
                exit();
            @endphp
    @endif
@endsection
