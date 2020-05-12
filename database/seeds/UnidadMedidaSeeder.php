<?php

use App\TipoUnidadMedida;
use App\UnidadMedida;
use Illuminate\Database\Seeder;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = TipoUnidadMedida::whereName('Unidades de masa')->value('id');
        UnidadMedida::create([
        	'name'=>'Kilogramos',
	        'identificador'=>'Kg',
	        'tipo_unidad_medida_id'=>$tipo,
        ]);

        $tipo = TipoUnidadMedida::whereName('Unidades de masa')->value('id');
        UnidadMedida::create([
        	'name'=>'Toneladas',
	        'identificador'=>'T',
	        'tipo_unidad_medida_id'=>$tipo,
        ]);

        $tipo = TipoUnidadMedida::whereName('Unidades de volumen')->value('id');
        UnidadMedida::create([
        	'name'=>'Litros',
	        'identificador'=>'L',
	        'tipo_unidad_medida_id'=>$tipo,
        ]);

        $tipo = TipoUnidadMedida::whereName('Unidades de volumen')->value('id');
        UnidadMedida::create([
            'name'=>'Metros cúbicos',
            'identificador'=>'m3',
            'tipo_unidad_medida_id'=>$tipo,
        ]);

        $tipo = TipoUnidadMedida::whereName('Unidades de cantidad')->value('id');
        UnidadMedida::create([
        	'name'=>'Manojos',
	        'identificador'=>'Mjos',
	        'tipo_unidad_medida_id'=>$tipo,
        ]);

        $tipo = TipoUnidadMedida::whereName('Unidades de cantidad')->value('id');
        UnidadMedida::create([
        	'name'=>'Paquetes',
	        'identificador'=>'Pqtes',
	        'tipo_unidad_medida_id'=>$tipo,
        ]);

        $tipo = TipoUnidadMedida::whereName('Unidades de cantidad')->value('id');
        UnidadMedida::create([
        	'name'=>'Ruedas',
	        'identificador'=>'R',
	        'tipo_unidad_medida_id'=>$tipo,
        ]);

        $tipo = TipoUnidadMedida::whereName('Unidades de cantidad')->value('id');
        UnidadMedida::create([
        	'name'=>'Tercios',
	        'identificador'=>'ter',
	        'tipo_unidad_medida_id'=>$tipo,
        ]);
    }
}
