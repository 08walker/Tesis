<?php

use App\Arrastre;
use Illuminate\Database\Seeder;

class ArrastreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Arrastre::class,10)->create();
    }
}
