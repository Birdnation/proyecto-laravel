@extends('layouts.app')

@section('content')

@if (Auth::user()->rol == 'Administrador')
<div class="container">
    <div class="row mb-3">
        <div class="col col-2">
            <form method="GET" action="{{ route('usuario.index') }}">
                <input type="text" name="search" id="search" placeholder="Buscar por Rut">
                <button class="btn btn-success">buscar</button>
            </form>
        </div>
        <div class="col col-8">
            <p class="text-center" style="font-size: x-large">Gestión de Usuarios</p>
        </div>
        <div class="col col-2">
            <a class="btn btn-success btn-block" href={{ route('usuario.create') }}> <i class="fas fa-plus"></i> Usuario</a>
        </div>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Rut</th>
                <th style="width: 25%" scope="col">Nombre</th>
                <th style="width: 25%" scope="col">Email</th>
                <th style="width: 20%" scope="col">Rol</th>
                <th style="width: 20%" scope="col" colspan="3">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->rut}}</th>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->rol}}</td>
                <td><a class="btn btn-info" href={{ route('usuario.edit', [$usuario]) }}>editar</a></td>
                @if ($usuario->status === 1)
                    <td><a class="btn btn-warning" href={{ route('changeStatus', ['id' => $usuario]) }}>deshabilitar</a></td>
                @else
                    <td><a class="btn btn-info" href={{ route('changeStatus', ['id' => $usuario]) }}>habilitar</a></td>
                @endif

                <td><a class="btn btn-danger" href="">reiniciar clave</a></td>
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
