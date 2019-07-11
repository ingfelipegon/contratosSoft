<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSaadAbogados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::create('saad_abogados', function (Blueprint $table) {
        $table->increments('id');

        //Datos basicos
        $table->string('nombres_nombre1',100)->nullable();
        $table->string('nombres_nombre2',100)->nullable();
        $table->string('nombres_apellido1',100)->nullable();
        $table->string('nombres_apellido2',100)->nullable();
        $table->string('apellidos',100)->nullable();
        $table->integer('tipos_documentos_id')->unsigned()->nullable();
        $table->foreign('tipos_documentos_id')->references('id')->on('vsaad_tipos_documentos');
        $table->bigInteger('no_identificacion')->nullable();
        $table->bigInteger('tarjeta_profesional')->nullable();
        $table->date('fecha_expedicion')->nullable();
        $table->string('direccion_residencia',50)->nullable();
        $table->string('telefono_contacto',500)->nullable();
        $table->string('correo',30)->nullable();
        $table->string('grupo_etnico',100)->nullable();
        $table->string('trabajo_territorial',100)->nullable();

        $table->string('contrato',20)->nullable();
        $table->string('convenio',20)->nullable();
        $table->string('numero_contrato',100)->nullable();
        $table->string('resolucion',100)->nullable();
        $table->string('pnud',100)->nullable();


        $table->date('fecha_inicio_contrato')->nullable();
        $table->date('fecha_fin_contrato')->nullable();

        // Adjuntos
        $table->string('adjunto_penales',100)->nullable();
        $table->string('adjunto_contravencionales',100)->nullable();
        $table->string('adjunto_csj',100)->nullable();
        $table->string('adjunto_pgn',100)->nullable();
        $table->string('adjunto_tarjeta_profesional',100)->nullable();
        $table->string('adjunto_copia_tarjeta_profesional',100)->nullable();
        $table->string('adjunto_resolucion',100)->nullable();

        //Enfoque Diferencial`
        $table->integer('identidades_generos_id')->unsigned()->nullable();
        $table->foreign('identidades_generos_id')->references('id')->on('vsaad_identidades_generos');

        $table->integer('etnia_id')->unsigned()->nullable();
        $table->foreign('etnia_id')->references('id')->on('vsaad_pertenencias_etnias');

        $table->integer('sexo_id')->unsigned()->nullable();
        $table->foreign('sexo_id')->references('id')->on('vsaad_sexos');

        //Antecedentes
        // $table->integer('abogado_antecedente_id')->unsigned()->nullable();
        // $table->foreign('abogado_antecedente_id')->references('id')->on('vsaad_abogado_antecedente');
        //
        // //Experiencia
        // $table->integer('abogado_experiencia_id')->unsigned()->nullable();
        // $table->foreign('abogado_experiencia_id')->references('id')->on('vsaad_abogado_experiencia');
        //
        // //Educacion
        // $table->integer('abogado_educacion_id')->unsigned()->nullable();
        // $table->foreign('abogado_educacion_id')->references('id')->on('vsaad_abogado_educacion');

        //Caracterizacion
        $table->integer('tipos_abogados_id')->unsigned()->nullable();
        $table->foreign('tipos_abogados_id')->references('id')->on('vsaad_tipos_abogados');

        $table->integer('enfoques_abogados_id')->unsigned()->nullable();
        $table->foreign('enfoques_abogados_id')->references('id')->on('vsaad_enfoques_abogados');



        //Con tabla de usuarios
        $table->integer('users_id')->unsigned()->nullable();
        $table->foreign('users_id')->references('id')->on('users');

        $table->integer('activo')->unsigned()->nullable()->default(1);
        $table->string('estado',100)->nullable()->default('Activo');


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
      Schema::dropIfExists('saad_abogados');

    }
}
