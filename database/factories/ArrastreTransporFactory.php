<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Arrastre;
use App\ArrastreTranspor;
use App\Transportacion;
use Faker\Generator as Faker;

$factory->define(ArrastreTranspor::class, function (Faker $faker) {
    return [
        'transportacion_id' => Transportacion::InRandomOrder()->value('id')?:factory(Transportacion::class),
        'arrastre_id' => Arrastre::InRandomOrder()->value('id')?:factory(Arrastre::class),
    ];
});
