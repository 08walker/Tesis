<?php

use App\TipoArrastre;
use Illuminate\Database\Seeder;

class TipoArrastreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TipoArrastre::class,10)->create();
    }
}
