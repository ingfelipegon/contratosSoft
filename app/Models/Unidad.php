<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidad extends Model
{
    use SoftDeletes;
	protected $date = ['delete_at'];
	protected $table = 'unidades';
	protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];

    //UNA UNIDADA DE TIEMPO ESTA MUCHAS ADQUISICIONES TIENE MUCHAS TRANSACCIONES
	public function adquisiciones()
	{
		return $this->hasMany(Adquisicion::class);
	}

	//UNA UNIDADA DE TIEMPO ESTA MUCHAS ADQUISICIONES TIENE MUCHAS TRANSACCIONES
	public function logAdquisiciones()
	{
		return $this->hasMany(LogAdquisicion::class);
	}
    
}
