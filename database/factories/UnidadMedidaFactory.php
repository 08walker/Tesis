<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoUnidadMedida;
use App\UnidadMedida;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(UnidadMedida::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'identificador' => Str::random(7),
        'tipo_unidad_medida_id' => TipoUnidadMedida::InRandomOrder()->value('id')?:factory(TipoUnidadMedida::class),
    ];
});
