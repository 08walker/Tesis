<?php

use App\Envase;
use Illuminate\Database\Seeder;

class EnvaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Envase::class,10)->create();
    }
}
