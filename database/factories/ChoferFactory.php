<?php

use App\Equipo;
use App\Organizacion;
use App\Tercero;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Chofer::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstNameMale,
        'apellido'=>$faker->lastName,    
        'licencia'=>Str::random(7),
        'telefono'=>$faker->phoneNumber,
        //Para los boolean o cualquier otra cosa
        'es_propio'=>$faker->randomElement(['0','1']),

        'tercero_id'=> Tercero::InRandomOrder()->value('id')?:factory(Tercero::class),
        'equipo_id'=> Equipo::InRandomOrder()->value('id')?:factory(Equipo::class),
		'organizacion_id'=>Organizacion::InRandomOrder()->value('id')?:factory(Organizacion::class),
    ];
});