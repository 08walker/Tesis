<?php

use App\Transportacion;
use Illuminate\Database\Seeder;

class TransportacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transportacion::class,10)->create();
    }
}
