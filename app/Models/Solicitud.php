<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitud extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $table = 'solicitudes';

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

	//UNA SOLICITUD PERTENECE A UNA MODALIDAD
	public function modalidad()
	{
		return $this->belongsTo('App\Models\Modalidad','modalidad_id');
	}

    //UNA SOLICITUD PERTENECE A UN ESTADO EN SU OPERACION
	public function estadoOperacion()
	{
		return $this->belongsTo('App\Models\EstadoOperacion','estadooperacion_id');
    }

    //UNA SOLICITUD PERTENECE A UNA AREA DE TRABAJO O DEPENDENCIA
	public function area()
	{
		return $this->belongsTo('App\Models\Area','areasolicitante_id'::class);
    }

    //UNA SOLICITUD ESTA A CARGO DE UN RESPONSABLE O PERTENECE A UN RESPONSABLE
	public function responsable()
	{
		return $this->belongsTo('App\Models\User','respopnsable_id'::class);
    }
    
    //UNA SOLICITUD PERTENECE A UN ESTADO EN SU PROCESO
	public function estadoProceso()
	{
		return $this->belongsTo('App\Models\EstadoProceso','estadoproceso_id');
    }

    //UNA SOLICITUD ESTA CLASIFICADO CON UN TIPO DE TRAMITE
	public function tipoTramite()
	{
		return $this->belongsTo('App\Models\TipoTramite','tipotramite_id');
    }

    //UNA SOLICITUD COONTIENE VARIOS ARCHIVOS
	public function archivos()
	{
		return $this->hasMany(Archivo::class);
    }
    
    //UNA SOLICITUD COONTIENE VARIOS MOVIMIENTOS
	public function movimientos()
	{
		return $this->hasMany(Movimiento::class);
    }
    
}