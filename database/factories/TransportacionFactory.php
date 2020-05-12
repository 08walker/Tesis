<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transportacion;
use Faker\Generator as Faker;

$factory->define(Transportacion::class, function (Faker $faker) {
    return [
        'numero'=>str_random(7),
        'observacion'=>$faker->sentence(3),
    ];
});
