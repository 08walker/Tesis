<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ArrastreEnvaEquipo;
use App\Lugar;
use App\Organizacion;
use App\SelloRecibido;
use Faker\Generator as Faker;

$factory->define(SelloRecibido::class, function (Faker $faker) {
    return [
        'identificador'=>str_random(10),
	    //'fyh_quitado',
	    'observacion' => $faker->sentence(3),
	    'lugar_id' => Lugar::InRandomOrder()->value('id')?:factory(Lugar::class),
	    'organizacion_id'=>Organizacion::InRandomOrder()->value('id')?:factory(Organizacion::class),
	    'arrastre_enva_equipo_id' => ArrastreEnvaEquipo::InRandomOrder()->value('id')?:factory(ArrastreEnvaEquipo::class),
    ];
});
