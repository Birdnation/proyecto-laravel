@extends('layouts.app')

@section('content')
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>


<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->rol == "Administrador")
        <div class="card-deck">
            <div class="card">
                <i class="fas fa-users fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Administrar usuarios</h5>
                    <small class="text-muted">Permite o crear/editar/deshabilitar usuarios del sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="/usuario" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-graduation-cap fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Administrar Carreras</h5>
                    <small class="text-muted">Permite crear y/o editar carreras en el sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="/carrera" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->rol == "Jefe Carrera")
        <div class="card-deck">
            <div class="card">
                <i class="fas fa-users fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Carga masiva de estudiantes</h5>
                    <small class="text-muted">Permite realizar una carga masiva de estudiantes al sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="/carga-masiva" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-search fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Buscar estudiante</h5>
                    <small class="text-muted">Permite buscar un estudiante mediante su RUT.</small>
                </div>
                <div class="card-footer">
                    <a href="/buscar-estudiante" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
            <div class="card">
                <i class="fas fa-check-double fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Resolver solicitudes</h5>
                    <small class="text-muted">Permite visualizar todas las solicitudes recibidas con estado
                        "Pendiente".</small>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-info btn-block">IR</a>
                </div>
            </div>

            <div class="card">
                <i class="fas fa-info fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Estadísticas del sistema</h5>
                    <small class="text-muted">Permite visualizar mediante gráficos las distintas solicitudes del
                        sistema.</small>
                </div>
                <div class="card-footer">
                    <a href="/estadisticas" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @elseif (Auth::user()->rol == "Alumno")
        <div class="card-deck">
            <div class="card">
                <i class="fas fa-tasks fa-10x text-center"></i>
                <div class="card-body">
                    <h5 class="card-title text-center">Gestión de solicitudes</h5>
                    <small class="text-muted">Permite o crear/editar o anular solicitudes especiales.</small>
                </div>
                <div class="card-footer">
                    <a href="/solicitud" class="btn btn-info btn-block">IR</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
