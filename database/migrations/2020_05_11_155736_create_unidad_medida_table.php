<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadMedidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_medida', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',30);
            $table->string('identificador',50);
            $table->boolean('activo')->unsigned()->default(1);

            $table->unsignedBigInteger('tipo_unidad_medida_id');
            $table->foreign('tipo_unidad_medida_id')->references('id')->on('tipo_unidad_medida');

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
        Schema::dropIfExists('unidad_medida');
    }
}
