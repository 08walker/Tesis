<?php

use App\ArrastreEnvaEquipo;
use Illuminate\Database\Seeder;

class ArrastreEnvaEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ArrastreEnvaEquipo::class,10)->create();
    }
}
