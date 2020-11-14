<?php

//use App\EquipoTransp;
//use App\Lugar;
use App\TipoHito;
use App\Transportacion;
use Faker\Generator as Faker;

$factory->define(App\Hito::class, function (Faker $faker) {
    return [
        //'fyh_ini',
        //'fyh_fin',
        'description'=>$faker->sentence(3),
        //'observaciones'=>$faker->sentence(3),
        //'equipo_transp_id' => EquipoTransp::InRandomOrder()->value('id')?:factory(EquipoTransp::class),
        'tipo_hito_id ' => TipoHito::InRandomOrder()->value('id')?:factory(TipoHito::class),
        'transportacion_id' => TipoHito::InRandomOrder()->value('id')?:factory(Transportacion::class),
        //'lugar_id' => Lugar::InRandomOrder()->value('id')?:factory(Lugar::class),
    ];
});