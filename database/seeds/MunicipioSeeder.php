<?php

use App\Municipio;
use App\Provincia;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincia = Provincia::whereName('La Habana')->value('id');
        Municipio::create([
        	'name'=>'Playa',
        	'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('La Habana')->value('id');
        Municipio::create([
        	'name'=>'Arroyo Naranjo',
        	'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('La Habana')->value('id');
        Municipio::create([
        	'name'=>'Centro Habana',
        	'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('La Habana')->value('id');
        Municipio::create([
        	'name'=>'Plaza de la Revolución',
        	'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Holguín')->value('id');
        Municipio::create([
        	'name'=>'Holguín',
        	'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Holguín')->value('id');
        Municipio::create([
            'name'=>'Gibara',
            'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Granma')->value('id');
        Municipio::create([
        	'name'=>'Bayamo',
        	'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Pinar del Río')->value('id');
        Municipio::create([
        	'name'=>'Consolación del sur',
        	'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Pinar del Río')->value('id');
        Municipio::create([
        	'name'=>'Sandino',
        	'provincia_id'=>$provincia,
        ]);

        $provincia = Provincia::whereName('Pinar del Río')->value('id');
        Municipio::create([
            'name'=>'Pinar del Río',
            'provincia_id'=>$provincia,
        ]);

        $provincia = Provincia::whereName('Sancti Spíritus')->value('id');
        Municipio::create([
            'name'=>'Sancti Spíritus',
            'provincia_id'=>$provincia,
        ]);

        $provincia = Provincia::whereName('Villa Clara')->value('id');
        Municipio::create([
            'name'=>'Santa Clara',
            'provincia_id'=>$provincia,
        ]);

        $provincia = Provincia::whereName('Artemisa')->value('id');
        Municipio::create([
            'name'=>'Bauta',
            'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Artemisa')->value('id');
        Municipio::create([
            'name'=>'Caimito',
            'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Artemisa')->value('id');
        Municipio::create([
            'name'=>'Guanajay',
            'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Mayabeque')->value('id');
        Municipio::create([
            'name'=>'Santa Cruz del Norte',
            'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Mayabeque')->value('id');
        Municipio::create([
            'name'=>'Melena de Sur',
            'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Mayabeque')->value('id');
        Municipio::create([
            'name'=>'Batabano',
            'provincia_id'=>$provincia,
        ]);
        $provincia = Provincia::whereName('Isla de la Juventud')->value('id');
        Municipio::create([
            'name'=>'Nueva Gerona',
            'provincia_id'=>$provincia,
        ]);
    }
}
