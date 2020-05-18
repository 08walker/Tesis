<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transportacion;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Transportacion::class, function (Faker $faker) {
    return [
        'numero'=>Str::random(7),
        'observacion'=>$faker->sentence(3),
    ];
});
