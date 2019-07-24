<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoOperacion extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $hidden =['created_at','updated_at'];
    protected $table = 'estados_operacion';

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION DEL AREA
    ];

    //'COMENZAR AHORA ETAPA', 			
    //'ETAPA EN TIEMPO',			  
    //'INICIO ETAPA',		          
    //'SUPERA ETAPA',	

    //EL ESTADO DE UN AOPERACION ESTA MUCHAS VECES EN LA SOLICITUD
	public function solicitudes()
	{
		return $this->hasMany(Solicitud::class);
    }
    
    //EL ESTADO DE UN AOPERACION ESTA MUCHAS VECES EN LA TABLA DE MOVIMIENTOS
	public function movimientos()
	{
		return $this->hasMany(Movimiento::class);
	}
}
