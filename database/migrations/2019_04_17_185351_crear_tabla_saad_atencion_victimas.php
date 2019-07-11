<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSaadAtencionVictimas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Schema::create('saad_atencion_victimas', function (Blueprint $table) {
        $table->increments('id');

        //Datos basicos

        /*



        */

        $table->string('solicitud_anterior',2)->nullable();
        $table->string('no_registro_victima',100)->nullable();
        $table->string('formulario_propio',2)->nullable();
        $table->string('persona_victima',100)->nullable();
        $table->string('nombre_victima_solicitante',100)->nullable();
        $table->string('nombre2_victima_solicitante',100)->nullable();
        $table->string('apellido1_victima_solicitante',100)->nullable();
        $table->string('apellido2_victima_solicitante',100)->nullable();
        $table->integer('tipos_documentos_id')->unsigned()->nullable();
        $table->foreign('tipos_documentos_id')->references('id')->on('vsaad_tipos_documentos');
        $table->bigInteger('no_identificacion')->nullable();
        $table->string('direccion',100)->nullable();

        $table->integer('departamento_id')->unsigned()->nullable();
        $table->foreign('departamento_id')->references('id')->on('vsaad_departamentos');

        $table->integer('municipio_id')->unsigned()->nullable();
        $table->foreign('municipio_id')->references('id')->on('vsaad_municipios');

        $table->string('grupo_etnico',2)->nullable();
        $table->string('nombre_grupo_etnico',100)->nullable();
        $table->string('organizacion_victimas',100)->nullable();
        $table->string('nombre_organizacion_victimas',100)->nullable();
        $table->string('sujeto_colectivo',2)->nullable();
        $table->string('nombre_sujeto_colectivo',100)->nullable();
        $table->string('indicativo',100)->nullable();
        $table->string('telefono_fijo',100)->nullable();
        $table->string('telefono_celular',100)->nullable();
        $table->string('correo',100)->nullable();
        $table->string('ocupacion_actual',100)->nullable();

        /////////////////////////////////////////////////////////////

        $table->text('hecho_victimizante')->nullable();
        $table->string('adjunto_hecho_victimizante',100)->nullable();
        $table->date('fecha_hechos_inicio')->nullable();
        $table->date('fecha_hechos_fin')->nullable();

        $table->integer('departamento_hechos_id')->unsigned()->nullable();
        $table->foreign('departamento_hechos_id')->references('id')->on('vsaad_departamentos');

        $table->integer('municipio_hechos_id')->unsigned()->nullable();
        $table->foreign('municipio_hechos_id')->references('id')->on('vsaad_municipios');

        $table->text('lugar_hechos')->nullable();
        $table->string('adjunto_lugar_hechos',100)->nullable();

        /////////////////////////////////////////////////////////////

        $table->string('abogado_confianza',2)->nullable();
        $table->string('nombre_abogado',100)->nullable();
        $table->string('nombre2_abogado',100)->nullable();
        $table->string('apellido1_abogado',100)->nullable();
        $table->string('apellido2_abogado',100)->nullable();
        $table->string('direccion_abogado',100)->nullable();
        $table->string('telefono_abogado',100)->nullable();
        $table->string('celular_abogado',100)->nullable();
        $table->string('correo_abogado',100)->nullable();
        $table->string('adjunto_poder_abogado',100)->nullable();
        $table->string('poder_abogado',2)->nullable();
        $table->string('representado_actualmente_jep',2)->nullable();
        $table->string('manifiesta_interes',2)->nullable();
        $table->string('voluntad_actuar_solo',2)->nullable();
        $table->string('medio_representacion',100)->nullable();

        /////////////////////////////////////////////////////////////

        $table->string('riesgo_seguridad',2)->nullable();
        $table->text('razones_riesgo_seguridad')->nullable();
        $table->string('autoriza_notificacion',2)->nullable();

        /////////////////////////////////////////////////////////////

        $table->integer('activo')->unsigned()->nullable()->default(1);
        $table->string('codigo_registro',100)->nullable();
        $table->string('orfeo',100)->nullable();
        $table->string('estado',100)->nullable();
        $table->string('disclaimer',2)->nullable();




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
