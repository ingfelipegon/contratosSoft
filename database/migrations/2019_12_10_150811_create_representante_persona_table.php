<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representante_persona', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('representante_id')->unsigned();
            $table->integer('persona_id')->unsigned();
            
            $table->foreign('representante_id')->references('id')->on('representantes');
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
        Schema::dropIfExists('representante_persona');
    }
}
