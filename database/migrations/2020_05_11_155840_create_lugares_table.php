<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name',50);
            $table->boolean('activo')->unsigned()->default(1);

            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');
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
        Schema::dropIfExists('lugares');
    }
}
