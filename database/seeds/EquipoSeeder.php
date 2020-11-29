<?php

use App\Equipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Equipo::class,3)->create([
        	'organizacion_id'=>'1',
        ]);
        factory(Equipo::class,3)->create([
        	'organizacion_id'=>'2',
        ]);
        factory(Equipo::class,3)->create([
        	'organizacion_id'=>'3',
        ]);
        factory(Equipo::class,3)->create([
        	'organizacion_id'=>'4',
        ]);
        factory(Equipo::class,5)->create([
        	'organizacion_id'=>'5',
        ]);
        factory(Equipo::class,5)->create([
        	'tercero_id'=>'1',
        ]);
        factory(Equipo::class,5)->create([
        	'tercero_id'=>'2',
        ]);
        factory(Equipo::class,5)->create([
        	'tercero_id'=>'3',
        ]);
    }
}
