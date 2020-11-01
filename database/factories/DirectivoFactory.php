<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Directivo;
use App\Organizacion;
use App\User;
use Faker\Generator as Faker;

$factory->define(Directivo::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'user_id'=>User::InRandomOrder()->value('id')?:factory(User::class),
        'organizacion_id'=>Organizacion::InRandomOrder()->value('id')?:factory(Organizacion::class),
    ];
});
