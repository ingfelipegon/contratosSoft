<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoIdentificacion extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $table = 'tipos_identificacion';

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];
    
        //CEDULA, 
        //TARJETA
        //PASAPORTE
        //EXTRANJERIA
}
