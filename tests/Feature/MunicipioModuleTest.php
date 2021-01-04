<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MunicipioModuleTest extends TestCase
{
    /**
     * A basic feature test example.
     * @return void
    */

    use RefreshDatabase;

    public function test_municipio_index()
    {
        $response = $this->get('/municipios')
        ->assertStatus(200);
        //->assertRedirect('/login');
    }

    // public function test_municipio_create()
    // {
    //     $this->post(route('municipios.store'), [
    //         'name' => 'Malanga',
    //         'provincia_id' => '1',
    //     ])->assertRedirect(route('municipios'));
    // }
}