<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Arrastre;
use App\ArrastreTranspor;
use App\EquipoTransportacion;
use Faker\Generator as Faker;

$factory->define(ArrastreTranspor::class, function (Faker $faker) {
    return [
        'equipo_transp_id' => EquipoTransportacion::InRandomOrder()->value('id')?:factory(EquipoTransportacion::class),
        'arrastre_id' => Arrastre::InRandomOrder()->value('id')?:factory(Arrastre::class),
    ];
});
