<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    protected $table = 'bloques';

    protected $fillable = [        
        'nombre',		        	//STRING        nombre	
        // 'persona_id',			    //INT       	
    ];
    
    protected $hidden = [
        'pivot',
        'created_at',
        'updated_at',
    ];

    //UN PERSONA PERTENCE A MUCHAS BLOQUES
	public function personas()
	{
        return $this->belongsToMany(Persona::class, 'persona_bloque');
        // return $this->belongsToMany('App\Models\Persona','persona_id');
	}
}
