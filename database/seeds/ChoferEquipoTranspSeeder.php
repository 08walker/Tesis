<?php

use App\ChoferEquipoTransp;
use Illuminate\Database\Seeder;

class ChoferEquipoTranspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ChoferEquipoTransp::class,10)->create();
    }
}
