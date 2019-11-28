<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovimientoObservacion extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $table = 'movimiento_observaciones';
	// protected $hidden = [
    //     'created_at',
    //     'updated_at'
    // ];

    protected $fillable = [
        'descripcion',			//STRING        DESCRIPCION SOLICITUD
        'observacion',			//STRING        OBSERVACION MOVIMIENTO
        
    	'estadooperacion_id',	//INT           ID ESTADO OPERACION
        'movimiento_id',		//INT           ID RESPONSABLE ACTUAL HEREDA DE LA TABLA USER
        
    ];

    protected $hidden =['created_at','updated_at'];

    //UN MOVIMIENTO ESPECIFICO PERTENECE A UNA SOLCITUD REGISTRADA
	public function estadoOperacion()
	{
		return $this->belongsTo('App\Models\EstadoOperacion','estadooperacion_id');
    }

    //UN MOVIMIENTO PERTENECE A UNA MODALIDAD DE PROCESO CONTRACTUAL
	public function movimiento()
	{
		return $this->belongsTo('App\Models\Movimiento','movimiento_id');
    }
}
