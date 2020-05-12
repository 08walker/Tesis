<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chofer;
use App\ChoferEquipoTransp;
use App\EquipoTransportacion;
use Faker\Generator as Faker;

$factory->define(ChoferEquipoTransp::class, function (Faker $faker) {
    return [
		'equipo_transp_id'=> EquipoTransportacion::InRandomOrder()->value('id')?:factory(EquipoTransportacion::class),
        'chofer_id'=> Chofer::InRandomOrder()->value('id')?:factory(Chofer::class),        //
    ];
});
