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
                CREAR CARRERA
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form id="formulario" method="POST" action="{{ route('carrera.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">CÓDIGO</label>
                            <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror"
                                name="codigo" value="{{ old('codigo') }}" required autocomplete="codigo" autofocus>

                            @error('codigo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE</label>
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror"
                                name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                            @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button id="boton" class="btn btn-outline-primary">{{ __('Agregar') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>

    <script>
        const button = document.getElementById('boton');
        const form = document.getElementById('formulario')
        button.addEventListener('click', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Estas seguro que quieres agregar la carrera?, esta acción es irreversible',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Guardar',
                denyButtonText: `Cancelar`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    form.submit();

                } else if (result.isDenied) {
                    Swal.fire('No guardado', '', 'info')
                }
            })
        })
    </script>
    @else
    @php
    header("Location: /home" );
    exit();
    @endphp
    @endif
    @endsection
