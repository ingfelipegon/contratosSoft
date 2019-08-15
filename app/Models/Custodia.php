<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Custodia extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
    //protected $hidden =['created_at','updated_at'];

    protected $fillable = [
    	'descripcion',			//STRING        DESCRIPCION CUSTODIA
    	'estadocustodia_id',	//INT           ID ESTADO CUSTODIA
        'respopnsable_id',		//INT           ID RESPONSABLE ACTUAL HEREDA DE LA TABLA USER
    ];

    //UNA SOLICITUD PERTENECE A UN ESTADO EN SU OPERACION
	public function estadoCustodia()
	{
		return $this->belongsTo('App\Models\EstadoCustodia','estadocustodia_id');
    }

    //UNA SOLICITUD ESTA A CARGO DE UN RESPONSABLE O PERTENECE A UN RESPONSABLE
	public function responsable()
	{
		return $this->belongsTo('App\Models\User','respopnsable_id'::class);
    }
}