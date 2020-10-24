<?php

use App\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Producto::class)->create([           
			'name'=>'Criollos',
	        'unidad_medida_id'=>'6',
		]);
		
		factory(Producto::class)->create([           
			'name'=>'Popular',
	        'unidad_medida_id'=>'6',
		]);
		
		factory(Producto::class)->create([           
			'name'=>'Titanes',
	        'unidad_medida_id'=>'6',
		]);
		
		factory(Producto::class)->create([           
			'name'=>'Aromas',
	        'unidad_medida_id'=>'6',
		]);

        factory(Producto::class,11)->create();
    }
}