<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoOperacion extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION DEL AREA
    ];

    //'COMENZAR ETAPA', 			
    //'ESTAPA EN TIEMPO',			  
    //'INICIO ETAPA',		          
    //'SUPERA ETAPA',	
}
