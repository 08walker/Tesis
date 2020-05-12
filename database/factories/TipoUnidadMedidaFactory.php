<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoUnidadMedida;
use Faker\Generator as Faker;

$factory->define(TipoUnidadMedida::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
    ];
});
