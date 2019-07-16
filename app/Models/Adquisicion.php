<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adquisicion extends Model
{
    use SoftDeletes;
    protected $date = ['delete_at'];

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
}
