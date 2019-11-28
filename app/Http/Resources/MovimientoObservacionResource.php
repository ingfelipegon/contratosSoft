<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovimientoObservacionResource extends JsonResource
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
            'descripcion' => $this->descripcion,	
            'observacion' => $this->observacion,

            'estadooperacion_id' =>  $this->estadooperacion_id,
            'estadosOperacion' => $this->estadoOperacion,               //RELACION ESTADOS DE OPERACION
            'movimiento_id' =>  $this->movimiento_id,             
            'movimientos' => $this->movimiento,                         //RELACION DE MOVIMIENTOS
            'creado' => date("d-m-Y", strtotime($this->created_at)) ,                      //RELACION CON MODALIDAD
        ];
    }
}
