<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Administrador',
            'email' => 'admin@ucn.cl',
            'rut' => '173922825',
            'status' => 1,
            'rol' => 'Administrador',
            'password' => bcrypt("123456"),
        ]);

        \App\Models\Carrera::create([
            'codigo' => 1234,
            'nombre' => 'Carrera Prueba 1',
        ]);

        \App\Models\Solcitud::create([
            'tipo' => 'Sobrecupo'
        ]);
        \App\Models\Solcitud::create([
            'tipo' => 'Cambio Paralelo'
        ]);
        \App\Models\Solcitud::create([
            'tipo' => 'Eliminación Asignatura'
        ]);
        \App\Models\Solcitud::create([
            'tipo' => 'Inscripción Asignatura'
        ]);
        \App\Models\Solcitud::create([
            'tipo' => 'Ayudantía'
        ]);
        \App\Models\Solcitud::create([
            'tipo' => 'Facilidades'
        ]);
    }
}
