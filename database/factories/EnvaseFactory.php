<?php

use App\Organizacion;
use App\Tercero;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Envase::class, function (Faker $faker) {
    return [
        'identificador'=>Str::random(10),
        'volumen_max_carga'=>$faker->randomElement(['2','3','4','5','6','7','8','9']),
        'tara'=>$faker->randomElement(['2','3','4','5','6','7','8','9']),
        //'ocupado'=>$faker->randomElement(['0','1']),

        //'tercero_id'=> Tercero::InRandomOrder()->value('id')?:factory(Tercero::class),
        //'organizacion_id'=>Organizacion::InRandomOrder()->value('id')?:factory(Organizacion::class),
    ];
});