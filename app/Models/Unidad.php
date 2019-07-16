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

    //UNA UNIDADA DE TIEMPO ESTA MUCHAS ADQUISICIONES TIENE MUCHAS TRANSACCIONES
	public function adquisiciones()
	{
		return $this->hasMany(Adquisicion::class);
	}
    
}
