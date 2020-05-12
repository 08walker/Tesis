<?php

use App\Municipio;
use Faker\Generator as Faker;

$factory->define(App\Organizacion::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'identificador' =>str_random(7),
        'municipio_id' => Municipio::InRandomOrder()->value('id')?:factory(Municipio::class),
    ];
});
