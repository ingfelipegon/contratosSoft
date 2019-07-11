<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVsaadAbogadosAntecedentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vsaad_abogados_antecedentes', function (Blueprint $table) {
         $table->increments('id');
         $table->string('nombres',100)->nullable();
         $table->string('adjunto',100);
         $table->date('fecha_vigencia')->nullable();
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
        Schema::dropIfExists('vsaad_abogados_antecedentes');
    }
}
