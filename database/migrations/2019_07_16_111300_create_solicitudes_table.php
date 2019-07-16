<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item')->unsigned();
            $table->string('descripcion')->nullable();
            $table->string('nombresupervisor')->nullable();
            $table->boolean('tienereparto');

            $table->integer('estadoproceso_id')->unsigned();
            $table->foreign('estadoproceso_id')->references('id')->on('estados_proceso');

            $table->integer('estadooperacion_id')->unsigned();
            $table->foreign('estadooperacion_id')->references('id')->on('estados_operacion');

            $table->integer('modalidad_id')->unsigned();
            $table->foreign('modalidad_id')->references('id')->on('modalidades');

            $table->integer('fuente_id')->unsigned();
            $table->foreign('fuente_id')->references('id')->on('fuentes');
            
            $table->integer('areasolicitante_id')->unsigned();
            $table->foreign('areasolicitante_id')->references('id')->on('areas');

            $table->integer('respopnsable_id')->unsigned();
            $table->foreign('respopnsable_id')->references('id')->on('users');

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
        Schema::dropIfExists('solicitudes');
    }
}
