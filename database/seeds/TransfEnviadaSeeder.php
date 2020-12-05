<?php

use App\TransfEnviada;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransfEnviadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TransfEnviada::class,1)->create([
        	'fyh_salida'=> Carbon::now()->subDays(5),
        	'fyh_llegada'=>Carbon::now()->subDays(2),
            'origen_id'=>'1',
            'destino_id'=>'5',
            'transportacion_id'=>'1',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'origen_id'=>'1',
            'destino_id'=>'3',
            'transportacion_id'=>'1',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(8),
            'fyh_llegada'=>Carbon::now()->subDays(3),
            'origen_id'=>'6',
            'destino_id'=>'8',
            'transportacion_id'=>'2',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(8),
            'fyh_llegada'=>Carbon::now()->subDays(2),
            'origen_id'=>'6',
            'destino_id'=>'10',
            'transportacion_id'=>'2',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(6),
            'fyh_llegada'=>Carbon::now()->subDays(1),
            'origen_id'=>'4',
            'destino_id'=>'5',
            'transportacion_id'=>'3',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(6),
            'origen_id'=>'4',
            'destino_id'=>'1',
            'transportacion_id'=>'3',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'origen_id'=>'6',
            'destino_id'=>'4',
            'transportacion_id'=>'3',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'origen_id'=>'4',
            'destino_id'=>'6',
            'transportacion_id'=>'4',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'fyh_llegada'=>Carbon::now()->subDays(2),
            'origen_id'=>'4',
            'destino_id'=>'9',
            'transportacion_id'=>'4',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(1),
            'origen_id'=>'3',
            'destino_id'=>'7',
            'transportacion_id'=>'5',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(1),
            'origen_id'=>'7',
            'destino_id'=>'5',
            'transportacion_id'=>'6',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(2),
            'origen_id'=>'7',
        'destino_id'=>'2',
            'transportacion_id'=>'7',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'fyh_llegada'=>Carbon::now()->subDays(2),
            'origen_id'=>'8',
            'destino_id'=>'1',
            'transportacion_id'=>'8',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'origen_id'=>'5',
            'destino_id'=>'4',
            'transportacion_id'=>'9',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'origen_id'=>'1',
            'destino_id'=>'6',
            'transportacion_id'=>'10',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'origen_id'=>'1',
            'destino_id'=>'9',
            'transportacion_id'=>'10',
        ]);
        factory(TransfEnviada::class,1)->create([
            'fyh_salida'=> Carbon::now()->subDays(5),
            'origen_id'=>'8',
            'destino_id'=>'9',
            'transportacion_id'=>'8',
        ]);
    }
}
