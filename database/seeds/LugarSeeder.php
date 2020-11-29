<?php

use App\Lugar;
use Illuminate\Database\Seeder;

class LugarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lugar::class,1)->create([
        	'name'=> 'Almacen #1',
	        'organizacion_id'=>'1',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Almacen #2',
	        'organizacion_id'=>'2',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Almacen #3',
	        'organizacion_id'=>'3',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Almacen #4',
	        'organizacion_id'=>'4',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Almacen #5',
	        'organizacion_id'=>'5',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Almacen #6',
	        'organizacion_id'=>'1',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Almacen #7',
	        'organizacion_id'=>'2',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Almacen #8',
	        'organizacion_id'=>'3',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 1' ,
	        'tercero_id'=>'5',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 9' ,
	        'tercero_id'=>'7',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 2' ,
	        'tercero_id'=>'8',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 3' ,
	        'tercero_id'=>'9',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 4' ,
	        'tercero_id'=>'10',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 5' ,
	        'tercero_id'=>'11',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 6',
	        'tercero_id'=>'12',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 7' ,
	        'tercero_id'=>'13',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 8' ,
	        'tercero_id'=>'14',
        ]);
        factory(Lugar::class,1)->create([
        	'name'=> 'Fábrica 9' ,
	        'tercero_id'=>'15',
        ]);
    }
}
