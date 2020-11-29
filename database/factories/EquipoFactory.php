<?php

use App\Organizacion;
use App\Tercero;
use App\TipoEquipo;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Equipo::class, function (Faker $faker) {
    return [
        'identificador'=>Str::random(7),
        'description'=>$faker->sentence(3),
        'volumen_max_carga'=>$faker->randomElement(['3','4','5']),
        'peso_max_carga'=>$faker->randomElement(['2','3','4','5']),
        'puede_cargar'=>$faker->randomElement(['0','1']),
        //'ocupado'=>$faker->randomElement(['0','1']),
        'tipo_equipo_id'=>TipoEquipo::InRandomOrder()->value('id')?:factory(TipoEquipo::class),
        'tara'=>$faker->randomElement(['2','3','4','5','6','7','8','9']),
        //'tercero_id'=> Tercero::InRandomOrder()->value('id')?:factory(Tercero::class),
        //'organizacion_id'=>Organizacion::InRandomOrder()->value('id')?:factory(Organizacion::class),
    ];
});
