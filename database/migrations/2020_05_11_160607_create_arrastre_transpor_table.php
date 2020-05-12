<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrastreTransporTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrastre_transpor', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('equipo_transp_id');
            $table->foreign('equipo_transp_id')->references('id')->on('equipo_transportacion');
            $table->unsignedBigInteger('arrastre_id');
            $table->foreign('arrastre_id')->references('id')->on('arrastres');

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
        Schema::dropIfExists('arrastre_transpor');
    }
}
