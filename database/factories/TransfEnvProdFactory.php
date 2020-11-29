<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use App\TransfEnviada;
use App\Transf_Env_Prod;
use Faker\Generator as Faker;

$factory->define(Transf_Env_Prod::class, function (Faker $faker) {
    return [
        'cantidad_bultos'=>$faker->randomElement(['2','3','4','5']),
        'peso_kg'=>$faker->randomElement(['12','13','14','15']),
        'volumen_m3'=>$faker->randomElement(['2','3','4','5']),
        'observacion'=>$faker->sentence(3),
        'producto_id'=>Producto::InRandomOrder()->value('id')?:factory(Producto::class),
        'transf_enviada_id'=>TransfEnviada::InRandomOrder()->value('id')?:factory(TransfEnviada::class),
    ];
});
