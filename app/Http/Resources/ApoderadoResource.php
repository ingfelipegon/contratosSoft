<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApoderadoResource extends JsonResource
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
            'nombre' => $this->nombre,
            'documento' => $this->documento,
            'tipo_apoderado' => $this->tipo_apoderado,
        ];
    }
}
