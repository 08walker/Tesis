<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfRecProdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transf__rec__prods', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cantidad_bultos');
            $table->float('peso_kg', 8, 2);
            $table->float('volumen_m3', 8, 2);
            $table->longText('observacion')->nullable();
            $table->string('estado',50)->nullable();

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unsignedBigInteger('transf_recibida_id');
            $table->foreign('transf_recibida_id')->references('id')->on('transf_recibidas');

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
        Schema::dropIfExists('transf__rec__prods');
    }
}
