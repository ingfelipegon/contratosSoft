<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adquisicion extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];
	protected $hidden =['created_at','updated_at'];
	protected $table = 'adquisiciones';

    protected $fillable = [
    	'codUNSPSC',			//STRING
    	'item',					//INT			NUMERO CODIGO ITEM
    	'descripcion',			//STRING     	DESCRIPCION CONTRTATO
    	'mesinicio',			//INT           MES ESTIMADO INICIO PROCESO DE SELECCION
    	'mesoferta',			//INT           MES ESTIMADO PRESENTACION DE OFERTAS
    	'duracion',				//INT       	DURACION ESTIMADA DEL CONTRATO
    	'valortotal',			//STRING        VALOR TOTAL ESTIMADO   
    	'valorvigencia',		//STRING        VALOR ESTIMADO EN LA VIGENCIA ACTUAL  
    	'vigenciafutura',		//BIT           SE REQUIERE VIGENCIAS FUTURAS?
    	'nombreresponsable',	//STRING        NOMBRE RESPONSABLE
		'estadovigencia',		//STRING        ESTADO DE LA SOLICITUD DE LA VIGENCIA FUTURA, ASUME UNA DESCRIPCION
    	'unidadtiempo_id',		//INT  			UNIDAD DE TIEMPO DE LA DURACION ESIMADA DEL CONTRATO
    	'modalidad_id',			//INT           MODALIDAD DE SELECCION
    	'fuente_id'				//INT           FUENTE DE LOS RECURSOS
    ];

    //UN PLAN DE ADQUISICION PERTENECE A UNA UNIDAD DE MEDIDA
	public function unidadMedida()
	{
		return $this->belongsTo(Unidad::class);
    }
    
    //UN PLAN DE ADQUISICION PERTENECE A UNA MODALIDAD
	public function modalidad()
	{
		return $this->belongsTo(Modalidad::class);
    }
    
    //UN PLAN DE ADQUISICION PERTENECE A UNA FUENTE DE RECURSOS
	public function fuenteRecurso()
	{
		return $this->belongsTo(Fuente::class);
	}
}
