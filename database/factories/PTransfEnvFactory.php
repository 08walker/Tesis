<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lugar;
use App\PTransfEnv;
use App\Producto;
use Faker\Generator as Faker;

$factory->define(PTransfEnv::class, function (Faker $faker) {
    return [
        // 'year',
        // 'month',
        'peso_kg' => $faker->randomElement(['2','3','4','5']),
        'origen_id' => Lugar::InRandomOrder()->value('id')?:factory(Lugar::class),
        'destino_id' => Lugar::InRandomOrder()->value('id')?:factory(Lugar::class),
        'producto_id' => Producto::InRandomOrder()->value('id')?:factory(Producto::class),
    ];
});
