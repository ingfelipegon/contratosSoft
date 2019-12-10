<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    protected $fillable = [
		'observaciones',		//STRING        OBSERVACIONES

        'bloque_id' ,   	    //INT           ID BLOQUE
    	'persona_id',			//INT 			ID PERSONA
    	'representante_id',	    //INT           ID REPRESENTANTE
    ];
    
	protected $hidden =['created_at','updated_at'];

    //UN BLOQUE PERTENECE A UN TRASLADO
	public function bloque()
	{
        return $this->belongsTo('App\Models\Bloque','bloque_id');
    }

    //UN TRASLADO TIENE MUCHAS RESPUESTAS
	public function respuestas()
	{
		return $this->hasMany(Respuesta::class);
	}


}
