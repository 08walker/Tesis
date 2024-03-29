<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chofer;
use App\ChoferEquipoTransp;
use App\Transportacion;
use Faker\Generator as Faker;

$factory->define(ChoferEquipoTransp::class, function (Faker $faker) {
    return [
		'transportacion_id'=> Transportacion::InRandomOrder()->value('id')?:factory(Transportacion::class),
        'chofer_id'=> Chofer::InRandomOrder()->value('id')?:factory(Chofer::class),
    ];
});
