<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TramiteResource extends JsonResource
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
            'descripcion'=>$this->descripcion,
            'fecha_inicio'=>$this->fecha_inicio,
            'fecha_fin'=>$this->fecha_fin,
            'actuacion_actual'=>$this->actuacion_actual,
            'estado_ordinario_actual'=>$this->estado_ordinario_actual,
            'estado_extraordinario_actual'=>$this->estado_extraordinario_actual,
            'termino_acumulado'=>$this->termino_acumulado,
            'tema' => [
                'id' => $this->tema->id,
                'nombre' => $this->tema->nombre,
            ],
            'partes'=>$this->personas,
            'numeros_radicado_orfeo'=>$this->radicados,
            'magistrado' => $this->corporacion->magistrado(),
            'corporacion' => $this->corporacion->nombre,
            // 'despachos' => $this->corporacion->despachos,
            'abogado' => $this->usuario? $this->usuario->getNombreCompleto() : 'Sin asignar'
        ];
    }
}
