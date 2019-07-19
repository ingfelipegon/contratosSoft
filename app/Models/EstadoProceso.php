<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoProceso extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $hidden =['created_at','updated_at'];
    protected $table = 'estados_proceso';

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];

    //'EN PROCESO'
    //'FINALIZADO'
    
    //EL ESTADO DE UN PROCESO ESTA MUCHAS VECES EN LA SOLICITUD
	public function solicitudes()
	{
		return $this->hasMany(Solicitud::class);
    }
}
