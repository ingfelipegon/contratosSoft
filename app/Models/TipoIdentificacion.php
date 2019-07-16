<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoIdentificacion extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];
    
        //CEDULA, 
        //TARJETA
        //PASAPORTE
        //EXTRANJERIA
}
