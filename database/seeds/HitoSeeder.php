<?php

use App\Hito;
use Illuminate\Database\Seeder;

class HitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hito::class,10)->create([
        	'fyh_ini' =>'2020-02-05',
        	'fyh_fin'=>'2020-02-06',	
        ]);
    }
}
