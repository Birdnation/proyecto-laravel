<?php

namespace App\Http\Controllers;

use App\Models\Solcitud;
use App\Models\User;
use Illuminate\Http\Request;

class EstadisiticasController extends Controller
{
    public function showEstadistica()
    {
        $totalSolicitudes = 0;
        $totalPendiente = 0;
        $totalRechazada = 0;
        $totalAceptada = 0;
        $totalAceptadaObs = 0;
        $totalAnulada = 0;

        $cantTipo1 = 0;
        $cantTipo2 = 0;
        $cantTipo3 = 0;
        $cantTipo4 = 0;
        $cantTipo5 = 0;
        $cantTipo6 = 0;

        $cantEnRango = 0;

        $usuarios = User::where('rol', 'Alumno')->get();
        foreach ($usuarios as $key => $usuario) {
            foreach ($usuario->solicitudes as $key => $solicitud) {
                $totalSolicitudes++;
                switch ($solicitud->getOriginal()['pivot_estado']) {
                    case 0:
                        $totalPendiente++;
                        break;
                    case 1:
                        $totalRechazada++;
                        break;
                    case 2:
                        $totalAceptada++;
                        break;
                    case 3:
                        $totalAceptadaObs++;
                        break;
                    case 4:
                        $totalAnulada++;
                        break;
                    default:
                        # code...
                        break;
                }
                switch ($solicitud->getOriginal()['pivot_solcitud_id']) {
                    case 1:
                        $cantTipo1++;
                        break;
                    case 2:
                        $cantTipo2++;
                        break;
                    case 3:
                        $cantTipo3++;
                        break;
                    case 4:
                        $cantTipo4++;
                        break;
                    case 5:
                        $cantTipo5++;
                        break;
                    case 6:
                        $cantTipo6++;
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }

        return view('estadisticas.index')
            ->with('cantTipo1', $cantTipo1)
            ->with('cantTipo2', $cantTipo2)
            ->with('cantTipo3', $cantTipo3)
            ->with('cantTipo4', $cantTipo4)
            ->with('cantTipo5', $cantTipo5)
            ->with('cantTipo6', $cantTipo6)
            ->with('totalPendiente', $totalPendiente)
            ->with('totalRechazada', $totalRechazada)
            ->with('totalAceptada', $totalAceptada)
            ->with('totalAceptadaObs', $totalAceptadaObs)
            ->with('totalAnulada', $totalAnulada)
            ;
    }
}
