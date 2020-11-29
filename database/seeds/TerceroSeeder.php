<?php

use App\Municipio;
use App\Tercero;
use Illuminate\Database\Seeder;

class TerceroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $municipio = Municipio::whereName('Plaza de la Revolucion')->value('id');;
        Tercero::create([
        	'name'=>'Ausa Coyula',
        	'identificador'=>'asd123',
        	'municipio_id'=>$municipio,
        ]);

        $municipio = Municipio::whereName('Playa')->value('id');;
        Tercero::create([
        	'name'=>'Transcontenedores',
        	'identificador'=>'qwe123',
        	'municipio_id'=>$municipio,
        ]);

        $municipio = Municipio::whereName('Holguin')->value('id');;
        factory(Tercero::class,5)->create([
        	'municipio_id'=>$municipio,
        ]);

        factory(Tercero::class,8)->create();
    }
}
