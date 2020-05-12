<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ArrastreEnvaEquipo;
use App\ArrastreTranspor;
use App\Envase;
use Faker\Generator as Faker;

$factory->define(ArrastreEnvaEquipo::class, function (Faker $faker) {
    return [
        'observacion'=>$faker->sentence(3),
        'arrastre_transp_id' => ArrastreTranspor::InRandomOrder()->value('id')?:factory(ArrastreTranspor::class),
        'envase_id' => Envase::InRandomOrder()->value('id')?:factory(Envase::class),
    ];
});
