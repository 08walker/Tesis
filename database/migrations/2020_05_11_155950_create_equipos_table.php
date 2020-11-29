<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('identificador');
            $table->longText('description')->nullable();
            $table->double('volumen_max_carga', 8, 2);
            $table->double('peso_max_carga', 8, 2);
            $table->boolean('puede_cargar')->unsigned()->default(1);
            $table->boolean('ocupado')->unsigned()->default(1);
            $table->boolean('activo')->unsigned()->default(1);
            $table->double('tara', 8, 2);

            $table->unsignedBigInteger('tipo_equipo_id');
            $table->foreign('tipo_equipo_id')->references('id')->on('tipo_equipo');
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
        Schema::dropIfExists('equipos');
    }
}
