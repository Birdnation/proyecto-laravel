@extends('layouts.app')

@section('content')

@if (Auth::user()->rol == 'Administrador')
@if (session('success'))
   <div class="alert alert-success">
        {{ session('success') }}
   </div>
@endif
<div class="container">
    <div class="row mb-3">
        <div class="col col-2">
            <form method="GET" action="{{ route('carrera.index') }}">
                <input type="text" name="search" id="search" placeholder="Buscar por codigo">
                <button class="btn btn-success">buscar</button>
            </form>
        </div>
        <div class="col col-8">
            <p class="text-center" style="font-size: x-large">Gestión de carreras</p>
        </div>
        <div class="col col-2">
            <a class="btn btn-success btn-block" href="carrera/create"> <i class="fas fa-plus"></i> Carrera</a>
        </div>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th style="width: 10%" scope="col">Código</th>
                <th style="width: 70%" scope="col">Nombre</th>
                <th style="width: 20%" scope="col" colspan="1">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carreras as $carrera)
            <tr>
                <th scope="row">{{$carrera->codigo}}</th>
                <td>{{$carrera->nombre}}</td>
                <td><a class="btn btn-info" href={{ route('carrera.edit', [$carrera]) }}>editar</a></td>
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
header("Location: /home" );
exit();
@endphp
@endif


@endsection
