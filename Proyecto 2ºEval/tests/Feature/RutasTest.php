<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RutasTest extends TestCase
{
    /** @test */
    public function test_login_route(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function test_404_route(): void
    {
        $response = $this->get('/non-existent-route');
        $response->assertStatus(404);
    }

    public function test_confirmar_eliminar_usuario_route(): void
    {
        $response = $this->get('/usuarios/confirmar_eliminar/3');
        $response->assertStatus(302);
    }

    /** @test */
    public function test_home_route(): void
    {
        $response = $this->get('/');
        // Al no estar logeado, se redirige a la página de login
        $response->assertStatus(302);
    }

    /** @test */
    public function test_usuarios_route(): void
    {
        $response = $this->get('/usuarios');
        $response->assertStatus(302); // Redirije porque no esta autenticado
    }

    /** @test */
    public function test_usuarios_crear_route(): void
    {
        $response = $this->get('/usuarios/create');
        $response->assertStatus(302); // Redirije porque no esta autenticado
    }

    /** @test */
    public function test_usuarios_editar_route(): void
    {
        $response = $this->get('/usuarios/14/edit');
        $response->assertStatus(302); // Redirije porque no esta autenticado
    }

    /** @test */
    public function test_usuarios_confirmar_eliminar_route(): void
    {
        $response = $this->get('/usuarios/confirmar_eliminar/3');
        $response->assertStatus(302); // Redirije porque no esta autenticado
    }

    /** @test */
    public function test_usuarios_mostrar_route(): void
    {
        $response = $this->get('/usuarios/14');
        $response->assertStatus(302); // Redirije porque no esta autenticado
    }

    /** @test */
    public function test_crear_usuario(): void
    {
        $userData = [
            'name' => 'Paco',
            'email' => 'paco@example.com',
            'password' => 'paco123456',
        ];

        $response = $this->post('/usuarios', $userData);
        
        // Redirije al crear correctamente al usuario
        $response->assertStatus(302);
    }

    /** @test */
    public function test_editar_usuario(): void
    {
        $userData = [
            'name' => 'Paco actualizado',
            'email' => 'paquito@gmail.com',
            'password' => 'Paco12345@%',
        ];

        $response = $this->put('/usuarios/14', $userData);
        
        // Redirije al modificar correctamente al usuario
        $response->assertStatus(302);
    }

    /** @test */
    public function test_eliminar_usuario(): void
    {
        $response = $this->delete('/usuarios/14');
        
        // Redirije al eliminar correctamente al usuario
        $response->assertStatus(302);
    }

    /** @test */
    public function test_get_all_users(): void
    {
        $response = $this->get('/usuarios');
        
        // Redirije por no estar logeado
        $response->assertStatus(302);
    }

    /** @test */
    public function test_tarea_crear_route(): void
    {
        $response = $this->get('/tareas/create');
        $response->assertStatus(200); // No redirije porque no se comprueba si el usuario está loegado
    }
}