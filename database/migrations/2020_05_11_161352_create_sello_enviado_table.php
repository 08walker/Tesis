<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelloEnviadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sello_enviado', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('identificador');
            $table->date('fyh_puesto');

            $table->unsignedBigInteger('lugar_id');
            $table->foreign('lugar_id')->references('id')->on('lugares');
            $table->unsignedBigInteger('organizacion_id');
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
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
        Schema::dropIfExists('sello_enviado');
    }
}
