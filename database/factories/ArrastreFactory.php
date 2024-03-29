<?php

use App\Equipo;
use App\Organizacion;
use App\Tercero;
use App\TipoArrastre;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Arrastre::class, function (Faker $faker) {
    return [
        'identificador'=>Str::random(7),
        'description'=>$faker->sentence(3),
        'volumen_max_carga'=>$faker->randomElement(['3','4','5']),
        'peso_max_carga'=>$faker->randomElement(['2','3','4','5']),
        //'ocupado'=>$faker->randomElement(['0','1']),
        'tara'=>$faker->randomElement(['2','3','4','5','6','7','8','9']),
        'equipo_id'=> Equipo::InRandomOrder()->value('id')?:factory(Equipo::class),
        'tipo_arrastre_id'=>TipoArrastre::InRandomOrder()->value('id')?:factory(TipoArrastre::class),
        //'tercero_id'=> Tercero::InRandomOrder()->value('id')?:factory(Tercero::class),
        //'organizacion_id'=>Organizacion::InRandomOrder()->value('id')?:factory(Organizacion::class),
    ];
});
