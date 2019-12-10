<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    protected $table = 'representantes';

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

    //UN PERSONA PERTENCE A MUCHOS REPRESENTANTES
	public function personas()
	{
        return $this->belongsToMany(Persona::class, 'representante_persona');
	}
}
