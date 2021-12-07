<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{

    /** @test */
    public function Pagina_login_cargada_exito():void
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertSee('INICIO SESIÓN');
    }

    /**
     * @test
    */
    public function Usuario_autenticado_exito():void
    {
        $user = User::create([
            'name' => "test",
            'email' => "test@test.cl",
            'password'=> bcrypt('123456'),
            'rut' => '1111111111',
            'status' => 1,
            'rol' => "Alumno",
            'carrera_id' => 1
        ]);
        $credentials = [
            "rut" => $user->rut,
            "password" => "123456"
        ];
        $this->post(route('login'),$credentials)
            ->assertRedirect('/home');
        $this->assertCredentials($credentials);
        $user->delete();
    }

    /**
     * @test
     */
    public function usuario_error_ingreso()
    {
        $user = User::create([
            'name' => "test",
            'email' => "test@test.cl",
            'password'=> bcrypt('123456'),
            'rut' => '1111111111',
            'status' => 1,
            'rol' => "Alumno",
            'carrera_id' => 1
        ]);
        $credentials = [
            "rut" => $user->rut,
            "password" => "225252"
        ];
        $this->post(route('login'),$credentials);
        $this->assertInvalidCredentials($credentials);
        $user->delete();
    }

    /**
     * @test
     */
    public function acceso_sin_datos()
    {
        $this->post(route('login'), [])->assertSessionHasErrors('rut');
    }

    /**
     * @test
     */
    public function acceso_restringido_ruta_home_sin_ingreso()
    {
        $this->get(route('home'))->assertRedirect(route('login'));
    }
}
