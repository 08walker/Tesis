<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoArrastre;
use Faker\Generator as Faker;

$factory->define(TipoArrastre::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
    ];
});
