<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVsaadAbogadosExperiencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vsaad_abogados_experiencias', function (Blueprint $table) {
         $table->increments('id');

         $table->string('entidad',100)->nullable();
         $table->string('cargo',100);
         $table->date('fecha_ingreso')->nullable();
         $table->date('fecha_salida')->nullable();

         $table->integer('abogado_id')->unsigned()->nullable();
         $table->foreign('abogado_id')->references('id')->on('saad_abogados');
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
      Schema::dropIfExists('vsaad_abogados_experiencias');
    }
}
