<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrasladoRespuestaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
          return [
            'id' => $this->id,  		
            'observaciones' => $this->observaciones,	

            'bloque_id' =>  $this->bloque_id,
            'bloque' => $this->bloque,                                      //RELACION BLOQUE
            'persona_id' =>  $this->persona_id,
            'persona' => $this->persona,                                    //RELACION PERSONA
            'representante_id' =>  $this->representante_id,
            'representante' => $this->representante,                        //RELACION REPRESENTANTE
            'respuestas' =>  $this->respuestas,                             //RELACION DE RESPUESTAS POR TRASLADOS
            'creado' => date("d-m-Y", strtotime($this->created_at)) ,       //FECHA CREACION TRASLADO-PREGUNTAS
        ];
    }
}
