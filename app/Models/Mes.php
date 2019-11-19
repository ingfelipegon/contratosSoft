<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mes extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $table = 'meses';

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];
    // ENERO
    // FEBRERO
    // MARZO
    // ABRIL
    // MAYO
    // JUNIO
    // JULIO
    // AGOSTO
    // SEPTIEMBRE
    // OCTUBRE
    // NOVIEMBRE
    // DICIEMBRE
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    //UNA MODALIDAD PERTENECE A MUCHAS SOLCITUDES
	public function solicitudes()
	{
		return $this->hasMany(Solicitud::class);
    }
    
}