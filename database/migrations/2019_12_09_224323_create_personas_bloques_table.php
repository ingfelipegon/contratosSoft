<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasBloquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_bloque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bloque_id')->unsigned();
            $table->integer('persona_id')->unsigned();
            
            $table->foreign('bloque_id')->references('id')->on('bloques');
            $table->foreign('persona_id')->references('id')->on('personas');
            
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
        Schema::dropIfExists('personas_bloques');
    }
}
