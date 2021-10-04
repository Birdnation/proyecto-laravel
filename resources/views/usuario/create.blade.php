@extends('layouts.app')

@section('content')

@if (Auth::user()->rol == 'Administrador')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="col-lg-12 login-title">
                CREAR USUARIO
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form method="POST" action="{{ route('usuario.store') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">NOMBRE</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">EMAIL</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">RUT</label>
                            <input id="rut" type="text" class="form-control @error('rut') is-invalid @enderror"
                                name="rut" value="{{ old('rut') }}" required autocomplete="rut">

                            @error('rut')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="form-control-label" style="color: white">Rol</label>
                            <select class="form-control" name="rol" id="rol">
                                <option value="Jefe Carrera">Jefe de carrera</option>
                                <option value="Alumno">Alumno</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="form-control-label" style="color: white">Carrera</label>
                            <select class="form-control" name="carrera" id="carrera" disabled>
                                <option value={{null}}>Seleccione carrera</option>
                                @foreach ($carreras as $carrera)
                                <option value={{$carrera->id}}>{{$carrera->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 py-3">
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-outline-primary">{{ __('Register') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
    <script>
        const rolSelect = document.getElementById('rol');
        const carreraSelect = document.getElementById('carrera')

        //variable de carreras desde el controlador de carreras
        const listaCarreras = {!! json_encode($carreras) !!}
        if (listaCarreras.length === 1) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No puedes crear usuarios sin tener carreras en el sistema!',
                footer: 'Para crear carreras has&nbsp;<a href="/carrera/create">click aca</a>'
            }).then((result) => {
                window.location.href = '/usuario'
            })
        }

        rolSelect.addEventListener('change', function(e){
            if (rolSelect.value === 'Jefe Carrera') {
            carreraSelect.value = null;
            carreraSelect.disabled = true;
            }else{
                carreraSelect.disabled = false;
            }
        })

    </script>

    @else
    @php
    header("Location: /home" );
    exit();
    @endphp
    @endif

    @endsection
