<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVsaadFrentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::create('vsaad_frentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('bloque_id')->unsigned()->nullable();
            $table->foreign('bloque_id')->references('id')->on('vsaad_bloques');
            $table->string('codigo')->nullable();
            $table->boolean('estado')->nullable();
            $table->timestamps();

        });
         DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vsaad_frentes');
    }
}
