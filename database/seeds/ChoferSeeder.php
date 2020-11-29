<?php

use App\Chofer;
use Illuminate\Database\Seeder;

class ChoferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Chofer::class,3)->create([
            'ci'=>'88023122584',
            'tercero_id'=>'1',
        ]);
        factory(Chofer::class,3)->create([
            'ci'=>'88063122584',
            'tercero_id'=>'2',
        ]);
        factory(Chofer::class,3)->create([
            'ci'=>'88073122584',
            'tercero_id'=>'3',
        ]);
        factory(Chofer::class,3)->create([
            'ci'=>'88083122584',
            'organizacion_id'=>'1',
        ]);
        factory(Chofer::class,5)->create([
            'ci'=>'88093122584',
            'organizacion_id'=>'2',
        ]);
        factory(Chofer::class,5)->create([
            'ci'=>'88093122584',
            'organizacion_id'=>'3',
        ]);
        factory(Chofer::class,5)->create([
            'ci'=>'88093122584',
            'organizacion_id'=>'4',
        ]);
        factory(Chofer::class,5)->create([
            'ci'=>'88093122584',
            'organizacion_id'=>'5',
        ]);
    }
}
