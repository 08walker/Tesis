<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrasrtreTranspEnvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrasrtre__transp__envas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('arrast_transp_id');
            $table->foreign('arrast_transp_id')->references('id')->on('arrasrtre__transps');
            $table->unsignedBigInteger('envase_id');
            $table->foreign('envase_id')->references('id')->on('envases');
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
        Schema::dropIfExists('arrasrtre__transp__envas');
    }
}
