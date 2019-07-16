<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archivo extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'nombre',			//STRING            NOMBRE ARCHIVO
        'descripcion',		//STRING            DESCRIPCION ARCHIVO
        'ruta',		        //STRING            RUTA ARCHIVO

        'solicitud_id'      //INT               ID SOLICITUD
    ];
}
