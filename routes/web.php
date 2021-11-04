<?php

use App\Http\Controllers\BuscarEstudianteController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DisabledUserController;
use App\Http\Controllers\SolcitudController;
use App\Http\Controllers\UsuarioController;
use App\Models\Solcitud;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', function (){
        $usuarioLogeado = Auth::user();
        return view('perfil')->with('user',$usuarioLogeado);
    });
});

Route::resource('carrera', CarreraController::class,['middleware'=>'auth']);
Route::resource('usuario', UsuarioController::class,['middleware' => 'auth']);

Route::middleware(['rutasAlumno'])->group(function () {
    Route::resource('solicitud', SolcitudController::class);

});

Route::middleware(['rutasJefe'])->group(function () {
    Route::get('buscar-estudiante', function(){return view('buscar-estudiante.index');})->name('buscarEstudiante');
    Route::post('alumno',[BuscarEstudianteController::class, 'devolverEstudiante'])->name('postBuscarEstudiante');
    Route::get('alumno/{id}', [BuscarEstudianteController::class,'mostrarEstudiante'])->name('mostrarEstudiante');
    Route::get('alumno/{alumno_id}/solicitud/{id}', [BuscarEstudianteController::class, 'verDatosSolicitud'])->name('verSolicitudAlumno');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/help', function () {
    return view('help');
})->name('help');

Route::post('/change-password',[ChangePasswordController::class, 'changePassword'])->name('changepassword');

Route::get('/status-user-change', [DisabledUserController::class, 'disabledUser'])->name('changeStatus');
