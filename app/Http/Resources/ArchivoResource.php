<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArchivoResource extends JsonResource
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
            'nombre' => $this->nombre,	
            'ruta' =>  $this->ruta,
            'solicitud_id' =>  $this->solicitud_id,                        //RELACION CON LA SOLICITUD            
        ];
    }
}
