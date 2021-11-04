<?php

namespace App\Http\Controllers;

use App\Models\Solcitud;
use App\Models\User;
use Illuminate\Http\Request;


class BuscarEstudianteController extends Controller
{
    public function devolverEstudiante(Request $request){

        //select * from user where rut = $rut
        $findUser = User::where('rut', $request->rut)->first();

        if (isset($findUser)) {
            if ($findUser->rol == "Alumno") {
                return redirect(route('mostrarEstudiante',['id' => $findUser->id]));
            }else {
                return redirect('buscar-estudiante')->with('error', 'El rut ingresado no es Alumno.');
            }
        }else {
            return redirect('buscar-estudiante')->with('error', 'Alumno no encontrado.');
        }
    }


    public function mostrarEstudiante(String $id){
        $user = User::where('id', $id)->with('carrera')->with('solicitudes')->first();

        return view('alumno.index')->with('user',$user);
    }

    public function verDatosSolicitud (String $id, String $alumno_id){

        $getUser = User::where('id', $id)->firstOrFail()->getSolicitudId($alumno_id)->first();
        return view('datosSolicitud.index')->with('solicitud',$getUser);
    }
}
