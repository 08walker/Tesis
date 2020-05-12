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
        factory(Chofer::class,15)->create([
            'ci'=>'88023122584'
        ]);
    }
}
