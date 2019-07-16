<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EtapaModadalidad extends Model
{
    use SoftDeletes;
    protected $table = 'etapas_modalidad';
    protected $date = ['delete_at'];

    protected $fillable = [
        'etapa_id',     		//INT  			ETAPA QUE CORRESPONDE DE ACUERDO A LA MODALIDAD SELECCIONADA
    	'modalidad_id',			//INT           MODALIDAD DE SELECCION
    	'duracionetapa',		//INT           DURACION ETAPA POR MODALIDAD
    ];
}
