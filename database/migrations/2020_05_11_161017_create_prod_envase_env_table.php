<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdEnvaseEnvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_envase_env', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('cantidad_bultos');
            $table->float('peso_kg', 8, 2);
            $table->float('volumen_m3', 8, 2);
            $table->longText('observacion')->nullable();

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->unsignedBigInteger('transf_enviada_id');
            $table->foreign('transf_enviada_id')->references('id')->on('transf_enviadas');
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
        Schema::dropIfExists('prod_envase_env');
    }
}
