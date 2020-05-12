<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePTransfRecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_transf_rec', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('year');
            $table->string('month');
            $table->float('peso_kg', 8, 2);

            $table->unsignedBigInteger('origen_id');
            $table->foreign('origen_id')->references('id')->on('lugares');
            $table->unsignedBigInteger('destino_id');
            $table->foreign('destino_id')->references('id')->on('lugares');
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
        Schema::dropIfExists('p_transf_rec');
    }
}
