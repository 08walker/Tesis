<?php

use App\TipoUnidadMedida;
use Illuminate\Database\Seeder;

class TipoUnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoUnidadMedida::create([
        	'name'=>'Unidades de masa',
        ]);
        TipoUnidadMedida::create([
        	'name'=>'Unidades de volumen',
        ]);
        TipoUnidadMedida::create([
        	'name'=>'Unidades de cantidad',
        ]);
    }
}
