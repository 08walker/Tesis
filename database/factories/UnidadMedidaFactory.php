<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoUnidadMedida;
use App\UnidadMedida;
use Faker\Generator as Faker;

$factory->define(UnidadMedida::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'identificador' => str_random(7),
        'tipo_unidad_medida_id' => TipoUnidadMedida::InRandomOrder()->value('id')?:factory(TipoUnidadMedida::class),
    ];
});
