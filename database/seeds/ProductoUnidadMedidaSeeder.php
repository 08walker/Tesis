<?php

use App\ProductoUnidadMedida;
use Illuminate\Database\Seeder;

class ProductoUnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductoUnidadMedida::class,10)->create();
    }
}
