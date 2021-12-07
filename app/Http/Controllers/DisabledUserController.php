<?php

namespace App\Http\Controllers;

use App\Mail\EstadoUsuarioMail;
use App\Mail\NotificacionUsuarioBanMail;
use App\Mail\stadoUsuarioMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DisabledUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function disabledUser (Request $request){
        $usuario = User::where('id', $request->id)->get()->first();
        if ($usuario->status === 0) {
            $usuario->status = 1;
            $usuario->save();
            Mail::to($usuario->email)->send(new EstadoUsuarioMail($usuario));
            return redirect('/usuario');
        }else {
            $usuario->status = 0;
            $usuario->save();
            Mail::to($usuario->email)->send(new EstadoUsuarioMail($usuario));
            return redirect('/usuario');
        }

    }
}
