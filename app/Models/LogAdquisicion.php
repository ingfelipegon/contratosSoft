<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogAdquisicion extends Model
{   
    use SoftDeletes;
	protected $date = ['delete_at'];
	protected $table = 'log_adquisicion';

    protected $fillable = [
		'codUNSPSC',			//STRING
		'item',					//INT			NUMERO CODIGO ITEM
    	'descripcion',			//STRING     	DESCRIPCION CONTRTATO
    	'mes_inicio_id',		//INT           MES ESTIMADO INICIO PROCESO DE SELECCION
		'mes_oferta_id',		//INT           MES ESTIMADO PRESENTACION DE OFERTAS
		'numero_proceso',		//STRING        NUMERO DE PROCESO
		'numero_contrato',		//STRING        NUMERO DE CONTRATO
    	'duracion',				//INT       	DURACION ESTIMADA DEL CONTRATO
    	'valortotal',			//STRING        VALOR TOTAL ESTIMADO   
    	'valorvigencia',		//STRING        VALOR ESTIMADO EN LA VIGENCIA ACTUAL  
    	'vigenciafutura',		//BIT           SE REQUIERE VIGENCIAS FUTURAS?
    	'nombreresponsable',	//STRING        NOMBRE RESPONSABLE
		'estadovigencia',		//STRING        ESTADO DE LA SOLICITUD DE LA VIGENCIA FUTURA, ASUME UNA DESCRIPCION
    	'unidadtiempo_id',		//INT  			UNIDAD DE TIEMPO DE LA DURACION ESIMADA DEL CONTRATO
    	'modalidad_id',			//INT           MODALIDAD DE SELECCION
		'fuente_id',			//INT           FUENTE DE LOS RECURSOS
		'abogado_id',			//INT           ABOGADO RESPONSABLE
		'adquisicion_id'		//INT           NUMERO DE ITEM DEL PAA
	];
	
	protected $hidden =['created_at','updated_at'];

    //UN PLAN DE ADQUISICION PERTENECE A UNA UNIDAD DE MEDIDA
	public function unidadMedida()
	{
		return $this->belongsTo('App\Models\Unidad','unidadtiempo_id');
    }
    
    //UN PLAN DE ADQUISICION PERTENECE A UNA MODALIDAD
	public function modalidad()
	{
		return $this->belongsTo(Modalidad::class);
    }
    
    //UN PLAN DE ADQUISICION PERTENECE A UNA FUENTE DE RECURSOS
	public function fuenteRecurso()
	{
		return $this->belongsTo('App\Models\Fuente','fuente_id');
	}

	//UN PLAN DE ADQUISICION PERTENECE A UN REGISTRO EN MESES
	public function mes_inicio()
	{
		return $this->belongsTo('App\Models\Mes','mes_inicio_id');
	}

	public function mes_oferta()
	{
		return $this->belongsTo('App\Models\Mes','mes_oferta_id');
	}

	//UNA SOLICITUD ESTA A CARGO DE UN RESPONSABLE O PERTENECE A UN RESPONSABLE
	public function abogado()
	{
		return $this->belongsTo('App\Models\User','abogado_id'::class);
    }
    
    //UNA SOLICITUD ESTA A CARGO DE UN RESPONSABLE O PERTENECE A UN RESPONSABLE
	public function adquisicion()
	{
		return $this->belongsTo('App\Models\Adquisicion','adquisicion_id'::class);
	}
}
