<?php

use App\EquipoTransportacion;
use Illuminate\Database\Seeder;

class EquipoTransportacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EquipoTransportacion::class,10)->create();
    }
}
