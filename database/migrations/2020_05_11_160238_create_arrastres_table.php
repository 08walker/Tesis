<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrastresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrastres', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('identificador');
            $table->longText('description')->nullable();
            $table->double('volumen_max_carga', 8, 2);
            $table->double('peso_max_carga', 8, 2);
            $table->boolean('es_propio')->unsigned()->default(0);
            $table->double('tara', 8, 2);
            $table->boolean('activo')->unsigned()->default(1);

            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->unsignedBigInteger('tercero_id');
            $table->foreign('tercero_id')->references('id')->on('terceros');
            $table->unsignedBigInteger('tipo_arrastre_id');
            $table->foreign('tipo_arrastre_id')->references('id')->on('tipo_arrastre');
            $table->unsignedBigInteger('organizacion_id');
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
        Schema::dropIfExists('arrastres');
    }
}
