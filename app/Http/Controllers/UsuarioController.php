<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\User;
use App\Rules\ValidarRut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search == null) {
            $usuarios = User::simplePaginate(5);
            return view('usuario.index')->with('usuarios',$usuarios);
        }else {
            $usuarios = User::where('rut', $request->search)->simplePaginate(1);
            return view('usuario.index')->with('usuarios',$usuarios);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::with('users')->get();
        return view('usuario.create')->with('carreras', $carreras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rut' => ['required', 'string', 'unique:users', new ValidarRut()],
            'rol' => ['string','required', 'in:Administrador,Jefe Carrera,Alumno'],
            'carrera'=>['exists:App\Models\Carrera,id']
        ]);


        //Logica para recortar el rut a 6 digitos:

        $defaultPassword = 123456;

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($defaultPassword),
            'rut' => $request['rut'],
            'rol' => $request['rol'],
            'status' => 1,
            'carrera_id' => $request->carrera,
        ]);
        return redirect('/usuario');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $carreras = Carrera::all();
        return view('usuario.edit')->with('usuario',$usuario)->with('carreras',$carreras);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'rut' => ['required', 'string', new ValidarRut()],
            'rol' => ['string','required', 'in:Jefe Carrera,Alumno'],
            'carrera'=>['exists:App\Models\Carrera,id']
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->rut = $request->rut;
        $usuario->rol = $request->rol;
        $usuario->carrera_id = $request->carrera;
        $usuario->save();
        return redirect('/usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
