<?php

use App\PTransfRec;
use Illuminate\Database\Seeder;

class PTransfRecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PTransfRec::class)->create([
        	'year'=>'2020',
        	'month'=>'janvier',
        ]);

        factory(PTransfRec::class)->create([
        	'year'=>'2020',
        	'month'=>'fevrier',
        ]);

        factory(PTransfRec::class)->create([
        	'year'=>'2020',
        	'month'=>'mars',
        ]);

        factory(PTransfRec::class)->create([
        	'year'=>'2020',
        	'month'=>'avril',
        ]);

        factory(PTransfRec::class)->create([
        	'year'=>'2020',
        	'month'=>'mai',
        ]);

        factory(PTransfRec::class)->create([
        	'year'=>'2020',
        	'month'=>'juin',
        ]);
    }
}
