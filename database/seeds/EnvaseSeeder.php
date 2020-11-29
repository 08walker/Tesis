<?php

use App\Envase;
use Illuminate\Database\Seeder;

class EnvaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Envase::class,3)->create([
        	'tercero_id'=>'1',
        ]);
        factory(Envase::class,3)->create([
        	'tercero_id'=>'2',
        ]);
        factory(Envase::class,3)->create([
        	'tercero_id'=>'3',
        ]);
        factory(Envase::class,5)->create([
        	'organizacion_id'=>'1',
        ]);
        factory(Envase::class,5)->create([
        	'organizacion_id'=>'2',
        ]);
        factory(Envase::class,5)->create([
        	'organizacion_id'=>'3',
        ]);
        factory(Envase::class,5)->create([
        	'organizacion_id'=>'4',
        ]);
        factory(Envase::class,5)->create([
        	'organizacion_id'=>'5',
        ]);
    }
}
