<?php

use App\TipoHito;
use Illuminate\Database\Seeder;

class TipoHitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(TipoHito::class)->create([
        // 	'name'=>'Carga',
        // 	'aumenta'=>'1',
        // 	'disminuye'=>'0',
        // ]);

        // factory(TipoHito::class)->create([
        // 	'name'=>'Descarga',
        // 	'aumenta'=>'0',
        // 	'disminuye'=>'1',
        // ]);

        // factory(TipoHito::class)->create([
        // 	'name'=>'Descanso',
        // 	'aumenta'=>'0',
        // 	'disminuye'=>'0',
        // ]);

        factory(TipoHito::class)->create([
        	'name'=>'Rotura',
        	'aumenta'=>'0',
        	'disminuye'=>'0',
        ]);

        // factory(TipoHito::class)->create([
        // 	'name'=>'Tránsito',
        // 	'aumenta'=>'0',
        // 	'disminuye'=>'0',
        // ]);

        factory(TipoHito::class)->create([
        	'name'=>'Trasbordo',
        	'aumenta'=>'0',
        	'disminuye'=>'1',
        ]);

        factory(TipoHito::class)->create([
            'name'=>'Exceso de humedad',
            'aumenta'=>'0',
            'disminuye'=>'0',
        ]);

        factory(TipoHito::class)->create([
            'name'=>'Faltante',
            'aumenta'=>'0',
            'disminuye'=>'0',
        ]);
    }
}
