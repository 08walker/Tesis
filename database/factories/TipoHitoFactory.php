<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoHito;
use Faker\Generator as Faker;

$factory->define(TipoHito::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
    ];
});
