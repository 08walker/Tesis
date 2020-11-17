<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfEnvProdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transf__env__prods', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cantidad_bultos')->nullable();
            $table->float('peso_kg', 8, 2);
            $table->float('volumen_m3', 8, 2);
            $table->longText('observacion')->nullable();

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unsignedBigInteger('transf_enviada_id');
            $table->foreign('transf_enviada_id')->references('id')->on('transf_enviadas');

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
        Schema::dropIfExists('transf__env__prods');
    }
}
