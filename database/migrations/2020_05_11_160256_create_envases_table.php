<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envases', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('identificador',20);
            $table->double('volumen_max_carga', 8, 2);
            $table->double('tara', 8, 2);
            $table->boolean('es_propio')->unsigned()->default(0);
            $table->boolean('activo')->unsigned()->default(1); 

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
        Schema::dropIfExists('envases');
    }
}
