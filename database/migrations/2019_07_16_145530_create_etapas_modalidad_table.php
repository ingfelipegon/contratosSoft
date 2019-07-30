<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapasModalidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapas_modalidad', function (Blueprint $table) {
            $table->integer('etapa_id')->unsigned();
            $table->integer('modalidad_id')->unsigned();
            $table->integer('duracionetapa')->unsigned();

            $table->foreign('etapa_id')->references('id')->on('etapas');
            $table->foreign('modalidad_id')->references('id')->on('modalidades');
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
        Schema::dropIfExists('etapas_modalidad');
    }
}
