<?php

use App\Transportacion;
use Illuminate\Database\Seeder;

class TransportacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'1'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'5'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'8'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'12'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'15'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'18'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'21'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'24'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'27'
        ]);
        factory(Transportacion::class,1)->create([
        	'equipo_id' =>'30'
        ]);
    }
}
