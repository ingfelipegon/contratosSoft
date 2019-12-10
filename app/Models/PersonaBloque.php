<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaBloque extends Model
{
    protected $table = 'persona_bloque';    

    protected $fillable = [
        'bloque_id',     		//INT  			
    	'persona_id',			//INT           
    ];
}
