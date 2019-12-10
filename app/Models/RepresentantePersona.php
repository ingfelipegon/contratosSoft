<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepresentantePersona extends Model
{
    protected $table = 'representante_persona';    

    protected $fillable = [
        'representante_id',     		//INT  			
    	'persona_id',			        //INT           
    ];
}
