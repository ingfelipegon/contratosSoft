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

    //UN MOVIMIENTO ESPECIFICO PERTENECE A UNA SOLCITUD REGISTRADA
	public function estadoOperacion()
	{
		return $this->belongsTo('App\Models\EstadoOperacion','estadooperacion_id');
    }

    //UN MOVIMIENTO ESTA A CARGO DE UN RESPONSABLE O PERTENECE A UN RESPONSABLE
	public function responsable()
	{
		return $this->belongsTo('App\Models\User','respopnsable_id'::class);
    }

    //UN MOVIMIENTO PERTENECE A UNA SOLICTUD
	public function solicitud()
	{
		return $this->belongsTo(Solicitud::class);
    }

    //UN MOVIMIENTO PERTENECE A UNA ETAPA DE UN PROCESO CONTRACTUAL
	public function etapa()
	{
		return $this->belongsTo(Etapa::class);
    }

    //UN MOVIMIENTO PERTENECE A UNA MODALIDAD DE PROCESO CONTRACTUAL
	public function modalidad()
	{
		return $this->belongsTo('App\Models\Modalidad','modalidad_id');
    }
}
