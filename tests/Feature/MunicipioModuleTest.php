<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MunicipioModuleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRurtaMun()
    {
        $response = $this->get('/municipios');
        $response->assertStatus(200)
        ->assertSee('Municipios');
    }
    
    public function test_login()
    {
        $this->get('/login')
        ->assertStatus(200)
        ->assertSee('Correo')
        ->assertSee('Contraseña');
    }
}
