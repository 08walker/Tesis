<?php

use App\TransfRecibida;
use Illuminate\Database\Seeder;

class TransfRecibidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TransfRecibida::class,10)->create([
        	'fyh_llegada'=>'2020-03-05',
        ]);
    }
}
