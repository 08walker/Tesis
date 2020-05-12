<?php

use App\ArrastreTranspor;
use Illuminate\Database\Seeder;

class ArrastreTransporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ArrastreTranspor::class,10)->create();
    }
}
