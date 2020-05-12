<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoEquipo;
use Faker\Generator as Faker;

$factory->define(TipoEquipo::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
    ];
});
