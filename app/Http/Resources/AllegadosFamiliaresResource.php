<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AllegadosFamiliaresResource extends JsonResource
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
            'nombre_allegado' => $this->nombre_allegado,
            'nombre2_allegado' => $this->nombre2_allegado,
            'apellido1_allegado' => $this->apellido1_allegado,
            'apellido2_allegado' => $this->apellido2_allegado,
            'documento_allegado' => $this->documento_allegado,
            'parentezco_allegado' => $this->parentezco_allegado,
            'adjunto_allegado' => $this->adjunto_allegado,
        ];
    }
}
