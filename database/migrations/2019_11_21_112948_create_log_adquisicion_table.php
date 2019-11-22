<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogAdquisicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_adquisicion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item')->unsigned();
            $table->string('codUNSPSC')->nullable();
            $table->string('descripcion', 1000)->nullable();     
            $table->string('numero_proceso')->nullable();
            $table->string('numero_contrato')->nullable();                               
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

            $table->integer('mes_inicio_id')->unsigned();
            $table->foreign('mes_inicio_id')->references('id')->on('meses');

            $table->integer('mes_oferta_id')->unsigned();
            $table->foreign('mes_oferta_id')->references('id')->on('meses');

            $table->integer('abogado_id')->unsigned();
            $table->foreign('abogado_id')->references('id')->on('users');   
            
            $table->integer('adquisicion_id')->unsigned();
            $table->foreign('adquisicion_id')->references('id')->on('adquisiciones');   
        
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
        Schema::dropIfExists('log_adquisicion');
    }
}
