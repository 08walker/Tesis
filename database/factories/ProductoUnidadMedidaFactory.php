<?php

use App\Producto;
use App\UnidadMedida;
use Faker\Generator as Faker;

$factory->define(App\ProductoUnidadMedida::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'factor' => $faker->randomElement(['2','3','4','5']),
        'unidad_medidas_id'=> UnidadMedida::InRandomOrder()->value('id')?:factory(UnidadMedida::class),
        'producto_id' => Producto::InRandomOrder()->value('id')?:factory(Producto::class),
    ];
});
