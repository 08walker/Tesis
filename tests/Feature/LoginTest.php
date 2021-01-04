<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertViewIs('auth.login')
            ->assertSee('Correo')
            ->assertSee('Contraseña');
    }

    public function test_login_display_error()
    {
        $this->post(route('login'),[])
                ->assertStatus(302)
                ->assertSessionHasErrors('email');
    }

    public function test_authenticates_and_redirects_user()
    {
        $this->post(route('login'), [
            'email' => 'laura@laura.com',
            'password' => '123456'
        ])->assertRedirect('/home');
    }
}