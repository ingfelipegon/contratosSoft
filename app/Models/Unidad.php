<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];
    
        //ANO
        //MES
        //DIA
}
