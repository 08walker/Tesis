<?php

use App\Directivo;
use Illuminate\Database\Seeder;

class DirectivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Directivo::create([
        	'name'=>'Director General',
        	'user_id'=>'5',
        	'organizacion_id'=>'6',
        ]);

        Directivo::create([
        	'name'=>'Director de Rama',
        	'user_id'=>'6',
        	'organizacion_id'=>'6',
        ]);

        Directivo::create([
        	'name'=>'Director Juridico',
        	'user_id'=>'7',
        	'organizacion_id'=>'6',
        ]);

        Directivo::create([
        	'name'=>'Director de UEB',
        	'user_id'=>'8',
        	'organizacion_id'=>'3',
        ]);

        Directivo::create([
        	'name'=>'Director de UEB',
        	'user_id'=>'9',
        	'organizacion_id'=>'3',
        ]);

        Directivo::create([
        	'name'=>'Esp. Principal de rama',
        	'user_id'=>'10',
        	'organizacion_id'=>'1',
        ]);

        Directivo::create([
        	'name'=>'Esp. Principal de rama',
        	'user_id'=>'11',
        	'organizacion_id'=>'2',
        ]);

        Directivo::create([
        	'name'=>'Esp. Principal de rama',
        	'user_id'=>'12',
        	'organizacion_id'=>'3',
        ]);

        Directivo::create([
        	'name'=>'Esp. Principal de rama',
        	'user_id'=>'13',
        	'organizacion_id'=>'4',
        ]);

        Directivo::create([
        	'name'=>'Esp. Principal de rama',
        	'user_id'=>'14',
        	'organizacion_id'=>'5',
        ]);

        //factory(Directivo::class,10)->create();
    }
}
