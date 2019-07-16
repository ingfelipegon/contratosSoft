<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitud extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'item',					//INT           NUMERO ITEM
    	'descripcion',			//STRING        DESCRIPCION SOLICITUD
    	'duracioncontrato',		//INT           DURACION CONTRATO EN MESES
    	'nombresupervisor',		//STRING        NOMBRE SUPERVISOR
    	'tienereparto',			//BIT			BANDERA TIENE REPARTO

    	'modalidad_id',			//INT 			ID MODALIDAD CONTRATO
    	'estadoproceso_id',		//INT           ID ESTADO PROCESO
    	'estadooperacion_id',	//INT           ID ESTADO OPERACION
    	'areasolicitante_id',   //INT           ID AREA SOLICITANTE
        'respopnsable_id',		//INT           ID RESPONSABLE ACTUAL HEREDA DE LA TABLA USER
        'tipotramite_id',	    //INT           ID TIPO TRAMITE
    ];
}
