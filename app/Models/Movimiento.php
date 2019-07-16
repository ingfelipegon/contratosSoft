<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'descripcion',			//STRING        DESCRIPCION SOLICITUD
    	'duracionetapa',		//INT           DURACION ETAPA POR MODALIDAD

        'solicitud_id' ,   	    //INT           ID SOLICITUD
    	'modalidad_id',			//INT 			ID MODALIDAD CONTRATO
    	'estadooperacion_id',	//INT           ID ESTADO OPERACION
        'respopnsable_id',		//INT           ID RESPONSABLE ACTUAL HEREDA DE LA TABLA USER
        'etapa_id' ,    	    //INT           ID ETAPA
    ];
}
