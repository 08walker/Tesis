<?php

use App\Organizacion;
use App\Tercero;
use App\TipoEquipo;
use Faker\Generator as Faker;

$factory->define(App\Equipo::class, function (Faker $faker) {
    return [
        'identificador'=>str_random(7),
        'description'=>$faker->sentence(3),
        'volumen_max_carga'=>$faker->randomElement(['3','4','5']),
        'peso_max_carga'=>$faker->randomElement(['2','3','4','5']),
        'puede_cargar'=>$faker->randomElement(['0','1']),
        'es_propio'=>$faker->randomElement(['0','1']),
        'tara'=>$faker->randomElement(['2','3','4','5','6','7','8','9']),
        'tercero_id'=> Tercero::InRandomOrder()->value('id')?:factory(Tercero::class),
        'tipo_equipo_id'=>TipoEquipo::InRandomOrder()->value('id')?:factory(TipoEquipo::class),
        'organizacion_id'=>Organizacion::InRandomOrder()->value('id')?:factory(Organizacion::class),
    ];
});
