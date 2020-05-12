<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoferEquipoTranspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer_equipo_transp', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('equipo_transp_id');
            $table->foreign('equipo_transp_id')->references('id')->on('equipo_transportacion');
            $table->unsignedBigInteger('chofer_id');
            $table->foreign('chofer_id')->references('id')->on('choferes');

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
        Schema::dropIfExists('chofer_equipo_transp');
    }
}
