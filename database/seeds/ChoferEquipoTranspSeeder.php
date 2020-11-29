<?php

use App\ChoferEquipoTransp;
use Illuminate\Database\Seeder;

class ChoferEquipoTranspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ChoferEquipoTransp::create([
        	'transportacion_id'=> '1',
        	'chofer_id'=> '1',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '1',
        	'chofer_id'=> '2',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '2',
        	'chofer_id'=> '5',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '2',
        	'chofer_id'=> '6',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '3',
        	'chofer_id'=> '9',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '3',
        	'chofer_id'=> '8',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '4',
        	'chofer_id'=> '11',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '4',
        	'chofer_id'=> '15',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '5',
        	'chofer_id'=> '18',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '6',
        	'chofer_id'=> '19',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '6',
        	'chofer_id'=> '21',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '3',
        	'chofer_id'=> '1',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '8',
        	'chofer_id'=> '24',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '7',
        	'chofer_id'=> '25',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '8',
        	'chofer_id'=> '26',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '9',
        	'chofer_id'=> '27',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '9',
        	'chofer_id'=> '28',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '10',
        	'chofer_id'=> '29',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '10',
        	'chofer_id'=> '30',
        ]);
        ChoferEquipoTransp::create([
        	'transportacion_id'=> '10',
        	'chofer_id'=> '3',
        ]);
    }
}
