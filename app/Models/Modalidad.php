<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidad extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    protected $table = 'modalidades';

    protected $fillable = [
    	'nombre',				//STRING 	NOMBRE
    	'descripcion'			//STRING    DESCRIPCION
    ];
    //[INVITACION COMPETITIVA PUBLICA, 
    //INVITACION COMPETITIVA PUBLICA, 
    //INVITACION COMPETITIVA PUBLICA, 
    //INVITACION COMPETITIVA CERRADA
    
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //UNA MODALIDAD PERTENCE A MUCHAS ETAPAS
	public function etapas()
	{
		return $this->belongsToMany(Etapa::class);
    }
    
    //UNA MODALIDAD PERTENECE A MUCHAS ADQUISICIONES
	public function adquisiciones()
	{
		return $this->hasMany(Adquisicion::class);
	}
    
    //UNA MODALIDAD PERTENECE A MUCHAS SOLCITUDES
	public function solicitudes()
	{
		return $this->hasMany(Solicitud::class);
    }
    
    //UNA MODALIDAD PERTENECE A MUCHOS MOVIMIENTOS
	public function movimientos()
	{
		return $this->hasMany(Movimiento::class);
	}
    

}
