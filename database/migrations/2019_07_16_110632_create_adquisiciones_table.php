<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdquisicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adquisiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codUNSPSC')->nullable();
            $table->integer('item')->unsigned();
            $table->string('descripcion')->nullable();
            $table->integer('mesinicio')->unsigned();
            $table->integer('mesoferta')->unsigned();
            $table->integer('duracion')->unsigned();
            $table->string('valortotal')->nullable();
            $table->string('valorvigencia')->nullable();
            $table->boolean('vigenciafutura');  
            $table->string('nombreresponsable')->nullable();        
            $table->string('estadovigencia')->nullable();

            $table->integer('unidadtiempo_id')->unsigned();
            $table->foreign('unidadtiempo_id')->references('id')->on('unidades');

            $table->integer('modalidad_id')->unsigned();
            $table->foreign('modalidad_id')->references('id')->on('modalidades');

            $table->integer('fuente_id')->unsigned();
            $table->foreign('fuente_id')->references('id')->on('fuentes');
        
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adquisiciones');
    }
}
