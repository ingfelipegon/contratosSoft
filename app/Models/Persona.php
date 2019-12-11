<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = [        
		'name',		        	//STRING        name
		'numeroDocumento',		//STRING        numeroDocumento
        'email',		        //STRING        email
        'password',             //STRING        password       
    ];
    
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at', 		
    ];

    //UN PERSONA PERTENCE A MUCHAS BLOQUES
	public function bloques()
	{
        return $this->belongsToMany(Bloque::class, 'persona_bloque');
        // return $this->belongsToMany('App\Models\Bloque','bloque_id');
    }
    
    //UN PERSONA PERTENCE A MUCHOS REPRESENTANTES
	public function representates()
	{
        return $this->belongsToMany(Representante::class, 'representante_persona');
        // return $this->belongsToMany('App\Models\Bloque','bloque_id');
    }
    
    //UNA PERSONA TIENE MUCHOS TRASLADOS
	public function traslados()
	{
		return $this->hasMany(Traslado::class);
	}

}
