<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EtapaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$etapas = [
        	'REVISIÓN INTERNA SC DE DOCUMENTOS RADICADOS', 
            'PUBLICACIÓN PREPLIEGOS Y RECEPCION DE OBSERVACIONES',
            'SOLICITUD DE OFERTA',
            'PUBLICACIÓN RESPUESTAS A PREPLIEGOS',
            'RECEPCIÓN DE PROPUESTAS',
            'EVALUACIÓN PROPUESTAS',
            'PUBLICACIÓN EVALUACIÓN Y SOLICITUD SUBSANES Y ACLARACIONES',
            'REPLICAS A OBSERVACIONES FORMULADAS',
            'RECEPCIÓN Y RESPUESTA A OBSERVACIONES A LA EVALUACIÓN',
            'EVENTO DE SUBASTA',
            'DIAS PARA ACTO DE ADJUDICACIÓN',
            'DÍAS FIRMA DEL ACTA DE INICIO',
        ];

        foreach ($etapas as $key => $value) {
        	DB::table('etapas')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
