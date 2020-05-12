<?php

use App\SelloRecibido;
use Illuminate\Database\Seeder;

class SelloRecibidoSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SelloRecibido::class,10)->create([
        	'fyh_quitado'=> '2020-04-20',
        ]);
    }
}
