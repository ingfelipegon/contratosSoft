<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fuente extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];
    
    //'PROPIOS', 
    //'NACION'

    //UNA FUENTE DE RECURSOS ESTA MUCHAS ADQUISICIONES
	public function adquisiciones()
	{
		return $this->hasMany(Adquisicion::class);
	}
    
}
