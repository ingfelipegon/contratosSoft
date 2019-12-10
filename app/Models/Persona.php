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
        // 'bloque_id',			//INT           
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

}
