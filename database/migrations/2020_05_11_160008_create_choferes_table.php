<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name',50);
            $table->string('apellido',50);
            $table->string('ci',11);
            $table->string('licencia');
            $table->string('telefono');
            $table->boolean('es_propio')->unsigned()->default(0);
            $table->boolean('activo')->unsigned()->default(1);

            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->unsignedBigInteger('tercero_id')->nullable();
            $table->foreign('tercero_id')->references('id')->on('terceros');
            $table->unsignedBigInteger('organizacion_id')->nullable();
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');

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
        Schema::dropIfExists('choferes');
    }
}
