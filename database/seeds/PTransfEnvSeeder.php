<?php

use App\PTransfEnv;
use Illuminate\Database\Seeder;

class PTransfEnvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PTransfEnv::class)->create([
        	'year'=>'2020',
        	'month'=>'janvier',
        ]);

        factory(PTransfEnv::class)->create([
        	'year'=>'2020',
        	'month'=>'fevrier',
        ]);

        factory(PTransfEnv::class)->create([
        	'year'=>'2020',
        	'month'=>'mars',
        ]);

        factory(PTransfEnv::class)->create([
        	'year'=>'2020',
        	'month'=>'avril',
        ]);

        factory(PTransfEnv::class)->create([
        	'year'=>'2020',
        	'month'=>'mai',
        ]);

        factory(PTransfEnv::class)->create([
        	'year'=>'2020',
        	'month'=>'juin',
        ]);
    }
}
