@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-6 login-box">
            <div class="login-title">REGISTRO DE ALUMNO</div>
            <div class="row">
                <div class="col-6">
                    <div class="row-12">
                        <div class="col-lg-12 login-key">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="row-12">
                        <div class="col-lg-12 mt-4 text-light login-title" style="font-size: 15px">
                            Nombre:
                            {{ $user->name }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <table class="table table-striped table-dark table-hover table-sm">
                        <tbody>
                            <tr>
                                <td>Rut:</td>
                                <td>{{ $user->rut }}</td>
                            </tr>
                            <tr>
                                <td>Carrera:</td>
                                <td>{{ $user->carrera()->first()->nombre }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-6 mt-3 login-box">
            <div class="col-12">
                <div class="login-title">SOLICITUDES</div>
                <table class="table table-striped table-dark table-hover table-sm">
                    <thead>
                        <th scope="col">id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ver</th>
                    </thead>
                    <tbody>
                        @forelse ($user->solicitudes as $solicitud)
                        <tr>
                            <td>{{$solicitud->getOriginal()['pivot_id']}}</td>
                            <td>{{$solicitud->getOriginal()['pivot_updated_at']}}</td>
                            <td>{{$solicitud->getOriginal()['tipo']}}</td>
                            <td><a class="btn btn-info" href={{ route('verSolicitudAlumno',
                                    ['id'=>$solicitud->getOriginal()['pivot_id'], 'alumno_id' => $user->id])
                                    }}>Ver</a></td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">
                                <p>Sin Solicitudes</p>
                            </td>
                        </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3 col-md-2"></div>
    </div>




    @endsection
