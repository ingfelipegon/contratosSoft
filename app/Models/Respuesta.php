<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    
    protected $fillable = [
		'respuesta',		    //STRING        OBSERVACIONES

        'traslado_id' ,   	    //INT           ID TRASLADO
    	'pregunta_id',			//INT 			ID PREGUNTA
    	'fase_id',	            //INT           ID FASE
    ];

    protected $hidden =['created_at','updated_at'];

    //UN BLOQUE PERTENECE A UN TRASLADO
	public function traslado()
	{
        return $this->belongsTo('App\Models\Traslado','traslado_id');
    }
    
}
