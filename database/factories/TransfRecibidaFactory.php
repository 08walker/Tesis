<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lugar;
use App\TransfRecibida;
use Faker\Generator as Faker;

$factory->define(TransfRecibida::class, function (Faker $faker) {
    return [
        //'fyh_llegada',
        'num_fact'=>$faker->randomElement(['2','3','4','5']),        
        'origen_id' => Lugar::InRandomOrder()->value('id')?:factory(Lugar::class),
        'destino_id' => Lugar::InRandomOrder()->value('id')?:factory(Lugar::class),
    ];
});
