@extends('layouts.app')

@section('content')
    @php
    $jefe = false;
    @endphp

    @if (Auth::user()->rol == 'Administrador')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="row mb-3">
                <div class="col col-3">
                    <form class="form-inline my-2 my-lg-0"
                        method="GET"
                        action="{{ route('carrera.index') }}">
                        <input class="form-control mr-sm-2"
                            name="search"
                            id="search"
                            type="search"
                            placeholder="Buscar por código"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0"
                            type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="col col-7">
                    <p class="text-center"
                        style="font-size: x-large">Gestión de carreras</p>
                </div>
                <div class="col col-2">
                    <a class="btn btn-success btn-block"
                        href="carrera/create"> <i class="fas fa-plus"></i> Carrera</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 10%"
                            scope="col">Código</th>
                        <th style="width: 35%"
                            scope="col">Nombre</th>
                        <th style="width: 35%"
                            scope="col">Jefe asociado</th>
                        <th style="width: 20%"
                            scope="col"
                            colspan="1">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carreras as $carrera)
                        <tr>
                            <th scope="row">{{ $carrera->codigo }}</th>
                            <td>{{ $carrera->nombre }}</td>
                            @php
                                $jefe = false;
                            @endphp
                            @foreach ($carrera->users()->get() as $us)
                                {{-- select * from USUARIOS, CARRERAS WHERE USUARIO.ID_CARRERA = CARRERA.ID --}}
                                @if ($us->rol == 'Jefe Carrera')
                                    <td>{{ $us->name }}</td>
                                    @php
                                        $jefe = true;
                                    @endphp
                                @endif
                            @endforeach
                            @if (!$jefe)
                                <td>sin jefe</td>
                            @endif
                            <td><a class="btn btn-info"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Edita la carrera"
                                    href={{ route('carrera.edit', [$carrera]) }}><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($carreras->links())
                <div class="d-flex justify-content-center">
                    {!! $carreras->links() !!}
                </div>
            @endif

        </div>

    @else
        @php
            header('Location: /home');
            exit();
        @endphp
    @endif


@endsection
