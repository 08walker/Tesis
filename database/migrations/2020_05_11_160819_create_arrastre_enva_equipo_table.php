<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrastreEnvaEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrastre_enva_equipo', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->longText('observacion')->nullable();

            $table->unsignedBigInteger('arrastre_transp_id');
            $table->foreign('arrastre_transp_id')->references('id')->on('arrastre_transpor');
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
        Schema::dropIfExists('arrastre_enva_equipo');
    }
}
