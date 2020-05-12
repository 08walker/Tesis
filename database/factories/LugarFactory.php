<?php

use App\Municipio;
use App\Organizacion;
use App\Tercero;
use Faker\Generator as Faker;

$factory->define(App\Lugar::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'municipio_id'=> Municipio::InRandomOrder()->value('id')?:factory(Municipio::class),
        'tercero_id'=> Tercero::InRandomOrder()->value('id')?:factory(Tercero::class),
        'organizacion_id'=>Organizacion::InRandomOrder()->value('id')?:factory(Organizacion::class),
    ];
});