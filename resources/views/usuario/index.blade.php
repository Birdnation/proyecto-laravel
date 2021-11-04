@extends('layouts.app')

@section('content')

@if (Auth::user()->rol == 'Administrador')
<div class="container">
    <div class="row mb-3">
        <div class="col col-3" >
            <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('usuario.index') }}">
                <input class="form-control mr-sm-2" name="search" id="search" type="search" placeholder="Buscar por rut" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="col col-7">
            <p class="text-center" style="font-size: x-large">Gestión de Usuarios</p>
        </div>
        <div class="col col-2">
            <a class="btn btn-success btn-block" href={{ route('usuario.create') }}> <i class="fas fa-plus"></i> Usuario</a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Rut</th>
                <th style="width: 25%" scope="col">Nombre</th>
                <th style="width: 25%" scope="col">Email</th>
                <th style="width: 20%" scope="col">Rol</th>
                <th style="width: 5%" scope="col">Editar</th>
                <th style="width: 5%" scope="col">Ban Unban</th>
                <th style="width: 5%" scope="col">Rest. Pass</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->rut}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->rol}}</td>
                <td><a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Permite editar al usuario y sus atributos" href={{ route('usuario.edit', [$usuario]) }}><i class="far fa-edit"></i></a></td>
                @if ($usuario->status === 1)
                    <td><a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Deshabilita al usuario" href={{ route('changeStatus', ['id' => $usuario]) }}><i class="fas fa-check"></i></a></td>
                @else
                    <td><a class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Habilita al usuario" href={{ route('changeStatus', ['id' => $usuario]) }}><i class="fas fa-ban"></i></a></td>
                @endif

                <td><a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Reinicia la contraseña del usuario"  href=""><i class="fas fa-key"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if ($usuarios->links())
        <div class="d-flex justify-content-center">
            {!! $usuarios->links() !!}
        </div>
    @endif

</div>

@else
@php
header("Location: /home" );
exit();
@endphp
@endif


@endsection
