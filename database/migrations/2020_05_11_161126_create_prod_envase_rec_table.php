<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdEnvaseRecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_envase_rec', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cantidad_bultos');
            $table->float('peso_kg', 8, 2);
            $table->float('volumen_m3', 8, 2);
            $table->longText('observacion')->nullable();
            $table->string('estado',50);

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unsignedBigInteger('hito_id')->nullable();
            $table->foreign('hito_id')->references('id')->on('hitos');
            $table->unsignedBigInteger('transf_recibida_id');
            $table->foreign('transf_recibida_id')->references('id')->on('transf_recibidas');
            $table->unsignedBigInteger('arrastre_enva_equipo_id');
            $table->foreign('arrastre_enva_equipo_id')->references('id')->on('arrastre_enva_equipo');

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
        Schema::dropIfExists('prod_envase_rec');
    }
}
