<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoTramite extends Model
{
    use SoftDeletes;
    protected $table = 'tipos_tramite';
    protected $date = ['delete_at'];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];
    
    //PRECONTRACTUAL, 
    //POSTCONTRACTUAL
    //NINGUNO

    //LA CLASIFICACION  DE UN TRAMITE ESTA EN DIFERENTES SOLICITUDES
	public function solicitudes()
	{
		return $this->hasMany(Solicitud::class);
    }
    
}
