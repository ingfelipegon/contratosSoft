<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogAdquisicionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

          // return parent::toArray($request);
          return [
            'id' => $this->id,  
            'codUNSPSC' => $this->codUNSPSC,			
            'descripcion' => $this->descripcion,	
            'duracion' => $this->duracion,
            'numero_proceso' => $this->numero_proceso,
            'numero_contrato' => $this->numero_contrato,
            'valortotal' => $this->valortotal,
            'valorvigencia' =>  $this->valorvigencia,
            'vigenciafutura' =>  $this->vigenciafutura,
            'nombreresponsable' =>  $this->nombreresponsable,
            'estadovigencia' =>  $this->estadovigencia,
            'unidadtiempo_id' =>  $this->unidadtiempo_id,
            'unidades_tiempo' => $this->unidadMedida,               //RELACION CON UNIDADES
            'modalidad_id' =>  $this->modalidad_id,             
            'modalidades' => $this->modalidad,                      //RELACION CON MODALIDAD
            'mes_inicio_id' => $this->mes_inicio_id,	
            'mesinicio' => $this->mes_inicio,			            //RELACION CON MES 
            'mes_oferta_id' =>  $this->mes_oferta_id,		
            'mesoferta' => $this->mes_oferta,                       //RELACION CON MES   
            'fuente_id' => $this->fuente_id,                    
            'fuente_recursos' => $this->fuenteRecurso,              //RELACION CON LA FUENTES DE LOS RECURSOS
            'abogado_id' => $this->fuente_id,                    
            'abogado' => $this->abogado,                            //RELACION CON EL ABOGADO RESPONSABLE     
            'item_id' => $this->fuente_id,                    
            'abogado' => $this->abogado,                            //RELACION CON EL ABOGADO RESPONSABLE            
        ];
    }
}
