<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVsaadAllegadosFamiliares extends Migration
{

  /*
  nombre_allegado	varchar
  documento_allegado	varchar
  parentezco_allegado	varchar
  adjunto_allegado	adjunto
  */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vsaad_allegados_familiares', function (Blueprint $table) {
         $table->increments('id');



         $table->string('nombre_allegado',100)->nullable();
         $table->string('nombre2_allegado',100)->nullable();
         $table->string('apellido1_allegado',100)->nullable();
         $table->string('apellido2_allegado',100)->nullable();
         $table->string('documento_allegado',100)->nullable();
         $table->string('parentezco_allegado',100)->nullable();
         $table->string('adjunto_allegado',100)->nullable();

         $table->integer('atencion_id')->unsigned()->nullable();
         $table->foreign('atencion_id')->references('id')->on('saad_atencion_victimas');
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
      Schema::dropIfExists('vsaad_allegados_familiares');
    }
}
