<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrasrtreTranspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrasrtre__transps', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('transportacion_id');
            $table->foreign('transportacion_id')->references('id')->on('transportaciones');
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
        Schema::dropIfExists('arrasrtre__transps');
    }
}
