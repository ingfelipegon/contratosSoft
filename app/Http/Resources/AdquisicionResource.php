<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdquisicionResource extends JsonResource
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
            'codUNSPSC' => $this->codUNSPSC,		
            'item' => $this->item,					
            'descripcion' => $this->descripcion,	
            'mesinicio' => $this->mesinicio,			
            'mesoferta' => $this->mesoferta,
            'duracion' => $this->duracion,
            'valortotal' => $this->valortotal,
            'valorvigencia' =>  $this->valorvigencia,
            'vigenciafutura' =>  $this->vigenciafutura,
            'nombreresponsable' =>  $this->nombreresponsable,
            'estadovigencia' =>  $this->estadovigencia,
            'unidadtiempo_id' =>  $this->unidadtiempo_id,
            'modalidad_id' =>  $this->modalidad_id,
            'fuente_id' =>  $this->fuente_id
        ];
    }
}
