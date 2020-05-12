<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ArrastreEnvaEquipo;
use App\ProdEnvaRec;
use App\Producto;
use App\TransfRecibida;
use Faker\Generator as Faker;

$factory->define(ProdEnvaRec::class, function (Faker $faker) {
    return [
        'cantidad_bultos' => $faker->randomElement(['2','3','4','5']),
        'peso_kg' => $faker->randomElement(['2','3','4','5']),
        'volumen_m3' => $faker->randomElement(['2','3','4','5']),
        'observacion' => $faker->sentence(3),
        'estado'=>$faker->sentence(1),
        'producto_id' => Producto::InRandomOrder()->value('id')?:factory(Producto::class),
        'transf_recibida_id' => TransfRecibida::InRandomOrder()->value('id')?:factory(TransfRecibida::class),
        'arrastre_enva_equipo_id' => ArrastreEnvaEquipo::InRandomOrder()->value('id')?:factory(ArrastreEnvaEquipo::class),
    ];
});
