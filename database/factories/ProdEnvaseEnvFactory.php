<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ArrastreEnvaEquipo;
use App\ProdEnvaEnv;
use App\Producto;
use App\TransfEnviada;
use Faker\Generator as Faker;

$factory->define(ProdEnvaEnv::class, function (Faker $faker) {
    return [
        'cantidad_bultos' => $faker->randomElement(['2','3','4','5']),
        'peso_kg' => $faker->randomElement(['2','3','4','5']),
        'volumen_m3' => $faker->randomElement(['2','3','4','5']),
        'observacion'=>$faker->sentence(3),
        'producto_id' => Producto::InRandomOrder()->value('id')?:factory(Producto::class),
        //'hito_id',
        'transf_enviada_id' => TransfEnviada::InRandomOrder()->value('id')?:factory(TransfEnviada::class),
        'arrastre_enva_equipo_id' => ArrastreEnvaEquipo::InRandomOrder()->value('id')?:factory(ArrastreEnvaEquipo::class),
    ];
});
