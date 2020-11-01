<?php

use App\Municipio;
use App\Organizacion;
use Illuminate\Database\Seeder;

class OrganizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipio = Municipio::whereName('Playa')->value('id');
    	Organizacion::create([
        	'name'=>'UEB Habana',
        	'identificador'=>'HGF564',
        	'municipio_id'=>$municipio,
        ]);

    	$municipio = Municipio::whereName('Bayamo')->value('id');
        Organizacion::create([
        	'name'=>'UEB Oriente',
        	'identificador'=>'LKJ564',
        	'municipio_id'=>$municipio,
        ]);

        $municipio = Municipio::whereName('Sancti Spíritus')->value('id');
        Organizacion::create([
            'name'=>'UEB Centro Este',
            'identificador'=>'FRE852',
            'municipio_id'=>$municipio,
        ]);

        $municipio = Municipio::whereName('Santa Clara')->value('id');
        Organizacion::create([
            'name'=>'UEB Centro Oeste',
            'identificador'=>'PLK753',
            'municipio_id'=>$municipio,
        ]);

        $municipio = Municipio::whereName('Pinar del Río')->value('id');
        Organizacion::create([
            'name'=>'UEB Pinar del Río',
            'identificador'=>'CDE268',
            'municipio_id'=>$municipio,
        ]);

        $municipio = Municipio::whereName('Plaza de la Revolución')->value('id');
        Organizacion::create([
            'name'=>'Empresa la Vega',
            'identificador'=>'AVB587',
            'municipio_id'=>$municipio,
        ]);

        factory(Organizacion::class,5)->create();
    }
}
