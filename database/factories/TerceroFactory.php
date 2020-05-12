<?php

use App\Municipio;
use Faker\Generator as Faker;

$factory->define(App\Tercero::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'identificador'=>str_random(10),
        'municipio_id'=> Municipio::InRandomOrder()->value('id')?:factory(Municipio::class),
    ];
});
