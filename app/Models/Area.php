<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE DEL AREA			[SALAS, GRAI, GRANCE]
    	'descripcion'			//STRING    DESCRIPCION DEL AREA
    ];

    //UNA DEPENDENCIA O AREA ESTA MUCHAS VECES EN LA SOLICITUD
	public function solicitudes()
	{
		return $this->hasMany(Solicitud::class);
    }
}

