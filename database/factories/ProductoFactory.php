<?php

use App\UnidadMedida;
use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstNameMale,
        'identificador' => str_random(7),
        'description'=>$faker->sentence(3),
        'unidad_medida_id'=> UnidadMedida::InRandomOrder()->value('id')?:factory(UnidadMedida::class),
    ];
});