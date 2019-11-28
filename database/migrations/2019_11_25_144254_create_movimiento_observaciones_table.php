<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion')->nullable();

            $table->integer('movimiento_id')->unsigned();
            $table->foreign('movimiento_id')->references('id')->on('movimientos');
            $table->string('observacion')->nullable();            

            $table->integer('estadooperacion_id')->unsigned();
            $table->foreign('estadooperacion_id')->references('id')->on('estados_operacion');

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
        Schema::dropIfExists('movimiento_observaciones');
    }
}
