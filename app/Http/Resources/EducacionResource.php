<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducacionResource extends JsonResource
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
            'titulo' => $this->titulo,
            'universidad' => $this->universidad,
            'pais' => $this->pais,
        ];
    }
}
