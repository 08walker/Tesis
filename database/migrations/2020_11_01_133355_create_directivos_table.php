<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directivos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',100);
            $table->boolean('activo')->unsigned()->default(1);

            $table->unsignedBigInteger('organizacion_id')->nullable();
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('directivos');
    }
}
