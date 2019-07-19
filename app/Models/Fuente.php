<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fuente extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $table = 'fuentes';

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];

        
    protected $hidden = [
        'created_at',
        'updated_at' 		
    ];
    
    //'PROPIOS', 
    //'NACION'

    //UNA FUENTE DE RECURSOS ESTA MUCHAS ADQUISICIONES
	public function adquisiciones()
	{
		return $this->hasMany(Adquisicion::class);
	}
    
}
