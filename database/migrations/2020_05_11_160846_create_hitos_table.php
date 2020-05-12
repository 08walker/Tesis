<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hitos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('fyh_ini');
            $table->date('fyh_fin');
            $table->longText('description');
            $table->longText('observaciones');

            $table->unsignedBigInteger('equipo_transp_id');
            $table->foreign('equipo_transp_id')->references('id')->on('equipo_transportacion');
            $table->unsignedBigInteger('tipo_hito_id');
            $table->foreign('tipo_hito_id')->references('id')->on('tipo_hito');
            $table->unsignedBigInteger('lugar_id');
            $table->foreign('lugar_id')->references('id')->on('lugares');

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
        Schema::dropIfExists('hitos');
    }
}
