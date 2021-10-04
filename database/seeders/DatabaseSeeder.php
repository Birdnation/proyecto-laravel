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
    }
}
