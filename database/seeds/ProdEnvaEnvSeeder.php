<?php

use App\ProdEnvaEnv;
use Illuminate\Database\Seeder;

class ProdEnvaEnvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProdEnvaEnv::class,10)->create();
    }
}
