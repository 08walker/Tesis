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
            $table->longText('description');
            $table->longText('observaciones');

            $table->unsignedBigInteger('transportacion_id');
            $table->foreign('transportacion_id')->references('id')->on('transportaciones');

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
