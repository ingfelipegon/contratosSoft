
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVsaadResponsables extends Migration
{

  /*
  nombre_responsable	varchar
  alias_responsable	varchar
  estructura_responsable	select
  */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vsaad_responsables', function (Blueprint $table) {
         $table->increments('id');

         $table->string('nombre_responsable',100)->nullable();
         $table->string('nombre2_responsable',100)->nullable();
         $table->string('apellido1_responsable',100)->nullable();
         $table->string('apellido2_responsable',100)->nullable();

         $table->string('alias_responsable',100)->nullable();
         $table->string('otro',100)->nullable();

         $table->integer('bloque_id')->unsigned()->nullable();
         $table->foreign('bloque_id')->references('id')->on('vsaad_bloques');

         $table->integer('frente_id')->unsigned()->nullable();
         $table->foreign('frente_id')->references('id')->on('vsaad_frentes');

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
      Schema::dropIfExists('vsaad_responsables');
    }
}
