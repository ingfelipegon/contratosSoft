<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoCustodia extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $hidden =['created_at','updated_at'];
    protected $table = 'estados_custodia';

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION DEL AREA
    ];

    //'EN CUSTODIA', 			
    //'EN PRESTAMO',			  
    //'ENTREGADO',		          

    //EL ESTADO DE UN AOPERACION ESTA MUCHAS VECES EN LA TABLA DE MOVIMIENTOS
	public function custodias()
	{
		return $this->hasMany(Custodia::class);
	}
}