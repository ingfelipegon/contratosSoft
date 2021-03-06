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
            'REVISIÓN Y APROBACIÓN COMITÉ DE CONTRATACIÓN',
            'PUBLICACIÓN REGLAS DE LA INVITACIÓN Y RECEPCION DE OBSERVACIONES',
            'SOLICITUD DE OFERTA',
            'PUBLICACIÓN RESPUESTAS A REGLAS DE LA INVITACIÓN',
            'RECEPCIÓN DE PROPUESTAS',
            'EVALUACIÓN PROPUESTAS',            
            'PUBLICACIÓN EVALUACIÓN Y SOLICITUD SUBSANES Y ACLARACIONES',
            'REPLICAS A OBSERVACIONES FORMULADAS',
            'RECEPCIÓN Y RESPUESTA A OBSERVACIONES A LA EVALUACIÓN',
            'EVENTO DE SUBASTA',
            'DIAS PARA ACEPTACIÓN DE OFERTA',
            'REVISION PRELIMINAR DE DOCUMENTOS',
            'SOLICITUD FORMAL DE INICIO',
            'RECEPCION FORMAL DE INICIO',
            'PROYECCION DE REMISION',
            'RECEPCION DOCUMENTO DE CARGOS',
            'REVISION DOCUMENTO DE CARGOS',
            'EFECTUAR PRACTICA DE PRUEBAS DESCARGOS',
            'PROYECCION Y ENVIO PARA APROBACION',
            'APROBACION CLAUSULA PENAL',
            'NOTIFICACION DECISION',
            'RECIBE Y REVISA LAS CONDICIONES DEL ACUERDO MARCO',
            'DESCARGA Y DILIGENCIA EL SIMULADOR FORMATO DE SOLICITUD DE COTIZACIÓN', 
            'SOLICITA LAS COTIZACIONES DEL BIEN O SERVICIO A CONTRATAR',
            'CIERRA EL EVENTO DE CONTRATACION, DESCARGA LAS COTIZACIONES',
            'DESCARGA LAS COTIZACIONES',
            'INGRESA A LA TIENDA VIRTUAL Y ADJUDICA LA OFERTA, GENERA LA ORDEN DE COMPRA',
            'SOLICITA EXPEDICIÓN REGISTRO PRESUPUESTAL Y NOTIFICA AL SUPERVISOR'
        ];

        foreach ($etapas as $key => $value) {
        	DB::table('etapas')->insert([
        		'nombre' => $value,
        		'descripcion' => Str::random(50),
        	]);
        }
    }
}
