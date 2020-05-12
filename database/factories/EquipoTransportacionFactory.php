<?php

use App\Equipo;
use App\Transportacion;
use Faker\Generator as Faker;

$factory->define(App\EquipoTransportacion::class, function (Faker $faker) {
    return [
        'transportacion_id'=> Transportacion::InRandomOrder()->value('id')?:factory(Transportacion::class),
        'equipo_id'=> Equipo::InRandomOrder()->value('id')?:factory(Equipo::class),
    ];
});
