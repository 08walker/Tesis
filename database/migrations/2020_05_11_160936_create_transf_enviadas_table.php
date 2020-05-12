<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfEnviadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transf_enviadas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('fyh_salida');
            $table->date('fyh_estimada_llegada');
            $table->string('num_fact',10);
            
            $table->unsignedBigInteger('origen_id');
            $table->foreign('origen_id')->references('id')->on('lugares');
            $table->unsignedBigInteger('destino_id');
            $table->foreign('destino_id')->references('id')->on('lugares');

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
        Schema::dropIfExists('transf_enviadas');
    }
}
