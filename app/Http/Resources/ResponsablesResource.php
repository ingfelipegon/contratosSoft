<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponsableResource extends JsonResource
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
            'nombre_responsable' => $this->nombre_responsable,
            'nombe2_responsable' => $this->nombe2_responsable,
            'apellido1_responsable' => $this->apellido1_responsable,
            'apellido2_responsable' => $this->apellido2_responsable,
            'alias_responsable' => $this->alias_responsable,
            'bloque_id' => $this->bloque,
            'frente_id' => $this->frente,
        ];
    }
}
