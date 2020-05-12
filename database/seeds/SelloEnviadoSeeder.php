<?php

use App\SelloEnviado;
use Illuminate\Database\Seeder;

class SelloEnviadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SelloEnviado::class,10)->create([
        	'fyh_puesto'=> '2020-04-20',
        ]);
    }
}
