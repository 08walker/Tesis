<?php

use App\Provincia;
use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::create([
        	'name'=>'Pinar del Río',
            'url' =>str_slug('Pinar del Río'),
        ]);
        Provincia::create([
            'name'=>'La Habana',
        	'url'=>str_slug('La Habana'),

        ]);
        Provincia::create([
        	'name'=>'Artemisa',
            'url'=>str_slug('Artemisa'),
        ]);
        Provincia::create([
        	'name'=>'Mayabeque',
            'url'=>str_slug('Mayabeque'),
        ]);
        Provincia::create([
        	'name'=>'Matanzas',
            'url'=>str_slug('Matanzas'),
        ]);
        Provincia::create([
        	'name'=>'Sancti Spíritus',
            'url'=>str_slug('Sancti Spíritus'),
        ]);
        Provincia::create([
        	'name'=>'Ciego de Ávila',
            'url'=>str_slug('Ciego de Ávila'),
        ]);
        Provincia::create([
        	'name'=>'Cienfuegos',
            'url'=>str_slug('Cienfuegos'),
        ]);
        Provincia::create([
        	'name'=>'Villa Clara',
            'url'=>str_slug('Villa Clara'),
        ]);
        Provincia::create([
        	'name'=>'Camagüey',
            'url'=>str_slug('Camagüey'),
        ]);
        Provincia::create([
        	'name'=>'Las Tunas',
            'url'=>str_slug('Las Tunas'),
        ]);
        Provincia::create([
        	'name'=>'Holguín',
            'url'=>str_slug('Holguín'),
        ]);
        Provincia::create([
        	'name'=>'Granma',
            'url'=>str_slug('Granma'),
        ]);
        Provincia::create([
        	'name'=>'Santiago de Cuba',
            'url'=>str_slug('Santiago de Cuba'),
        ]);
        Provincia::create([
        	'name'=>'Guantánamo',
            'url'=>str_slug('Guantánamo'),
        ]);
        Provincia::create([
        	'name'=>'Isla de la Juventud',
            'url'=>str_slug('Isla de la Juventud'),
        ]);
    }
}
