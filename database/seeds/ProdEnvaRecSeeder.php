<?php

use App\ProdEnvaRec;
use Illuminate\Database\Seeder;

class ProdEnvaRecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProdEnvaRec::class,10)->create();
    }
}
