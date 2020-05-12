<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoUnidadMedidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_unidad_medida', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',30);
            $table->double('factor', 8, 2);
            $table->boolean('activo')->unsigned()->default(1);

            $table->unsignedBigInteger('unidad_medidas_id');
            $table->foreign('unidad_medidas_id')->references('id')->on('unidad_medida');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_unidad_medida');
    }
}
