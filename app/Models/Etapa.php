<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etapa extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];

    //'ETAPA 1', 
    //'ETAPA 2',
    //'ETAPA 3',
    //'ETAPA 4'
    
    protected $hidden = [
        'pivot' 		
    ];

    //UNA ETAPA PERTENCE A MUCHAS MODALIDADES
	public function modalidades()
	{
		return $this->belongsToMany(Modalidad::class);
    }

    //UNA ETAPA PERTENECE A MUCHOS MOVIMIENTOS
	public function movimientos()
	{
		return $this->hasMany(Movimiento::class);
	}
}
