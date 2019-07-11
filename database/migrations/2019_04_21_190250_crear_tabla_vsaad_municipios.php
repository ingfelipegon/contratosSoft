<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVsaadMunicipios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::create('vsaad_municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('departamento_id')->unsigned()->nullable();
            $table->foreign('departamento_id')->references('id')->on('vsaad_departamentos');
            $table->string('codigo')->nullable();
            $table->string('tipo',4)->nullable();
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
        Schema::dropIfExists('vsaad_municipios');
    }
}
