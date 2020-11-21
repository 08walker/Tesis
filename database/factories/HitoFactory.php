<?php

use App\TipoHito;
use App\Transportacion;
use Faker\Generator as Faker;

$factory->define(App\Hito::class, function (Faker $faker) {
    return [
        'description'=>$faker->sentence(3),
        'tipo_hito_id ' => TipoHito::InRandomOrder()->value('id')?:factory(TipoHito::class),
        'transportacion_id' => Transportacion::InRandomOrder()->value('id')?:factory(Transportacion::class),
    ];
});