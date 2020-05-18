<?php

use App\Municipio;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Organizacion::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'identificador' =>Str::random(7),
        'municipio_id' => Municipio::InRandomOrder()->value('id')?:factory(Municipio::class),
    ];
});
