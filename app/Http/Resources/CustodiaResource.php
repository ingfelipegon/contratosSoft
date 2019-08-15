<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustodiaResource extends JsonResource
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
            'descripcion' => $this->descripcion,	
            'estadocustodia_id' =>  $this->estadocustodia_id,
            'estadosCustodia' =>  $this->estadoCustodia,                        //RELACION CON LOS ESTADOS DE LA CUSTODIA
            'respopnsable_id' =>  $this->respopnsable_id,
            'responsables' =>  $this->responsable,                              //RELACION DE RESPONSABLES
            'creado' =>  date("Y-m-d", strtotime($this->created_at)) ,          //CREADO
            'actualizado' =>  date("Y-m-d", strtotime($this->updated_at)),      //ACTUALIZADO
        ];
    }
}
