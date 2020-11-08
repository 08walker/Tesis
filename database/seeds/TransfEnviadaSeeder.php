<?php

use App\TransfEnviada;
use Illuminate\Database\Seeder;

class TransfEnviadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TransfEnviada::class,10)->create([
        	'fyh_salida'=>'2020-03-01',
        	//'fyh_estimada_llegada'=>'2020-03-05',
        ]);
    }
}
