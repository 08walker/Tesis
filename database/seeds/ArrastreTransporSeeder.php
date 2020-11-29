<?php

use App\Arrasrtre_Transp;
use Illuminate\Database\Seeder;

class ArrastreTransporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '1',
        	'arrastre_id'=> '1',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '1',
        	'arrastre_id'=> '2',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '2',
        	'arrastre_id'=> '5',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '2',
        	'arrastre_id'=> '6',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '3',
        	'arrastre_id'=> '9',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '3',
        	'arrastre_id'=> '8',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '4',
        	'arrastre_id'=> '11',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '4',
        	'arrastre_id'=> '15',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '5',
        	'arrastre_id'=> '18',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '6',
        	'arrastre_id'=> '19',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '6',
        	'arrastre_id'=> '21',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '3',
        	'arrastre_id'=> '1',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '8',
        	'arrastre_id'=> '24',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '7',
        	'arrastre_id'=> '25',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '8',
        	'arrastre_id'=> '26',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '9',
        	'arrastre_id'=> '27',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '9',
        	'arrastre_id'=> '28',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '10',
        	'arrastre_id'=> '29',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '10',
        	'arrastre_id'=> '30',
        ]);
        Arrasrtre_Transp::create([
        	'transportacion_id'=> '10',
        	'arrastre_id'=> '3',
        ]);
    }
}
