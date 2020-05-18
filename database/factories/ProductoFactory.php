<?php

use App\UnidadMedida;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Producto::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstNameMale,
        'identificador' => Str::random(7),
        'description'=>$faker->sentence(3),
        'unidad_medida_id'=> UnidadMedida::InRandomOrder()->value('id')?:factory(UnidadMedida::class),
    ];
});