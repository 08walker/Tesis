<?php

use App\Arrastre;
use Illuminate\Database\Seeder;

class ArrastreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Arrastre::class,3)->create([
        	'tercero_id'=>'1',
        ]);
        factory(Arrastre::class,3)->create([
        	'tercero_id'=>'2',
        ]);
        factory(Arrastre::class,3)->create([
        	'tercero_id'=>'3',
        ]);
        factory(Arrastre::class,5)->create([
        	'organizacion_id'=>'1',
        ]);
        factory(Arrastre::class,5)->create([
        	'organizacion_id'=>'2',
        ]);
        factory(Arrastre::class,5)->create([
        	'organizacion_id'=>'3',
        ]);
        factory(Arrastre::class,5)->create([
        	'organizacion_id'=>'4',
        ]);
        factory(Arrastre::class,5)->create([
        	'organizacion_id'=>'5',
        ]);
    }
}
