<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovimientoResource extends JsonResource
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
            'duracionetapa' => $this->duracionetapa,			
            'estadooperacion_id' =>  $this->estadooperacion_id,
            'estadosOperacion' =>  $this->estadoOperacion,          //RELACION CON LOS ESTADOS DE LA OPERACION
            'respopnsable_id' =>  $this->respopnsable_id,
            'responsables' =>  $this->responsable,                  //RELACION DE RESPONSABLES        
            'solicitud_id' => $this->solicitud_id,
            'solicitud' => $this->solicitud,                        //RELACION CON SOLICITUD
            'etapa_id' =>  $this->etapa_id,
            'etapas' =>  $this->etapa,                              //RELACION CON ETAPAS   
            'modalidad_id' =>  $this->modalidad_id,             
            'modalidades' => $this->modalidad,                      //RELACION CON MODALIDAD
            'creado' => date("d-m-Y", strtotime($this->created_at)) ,                      //RELACION CON MODALIDAD
        ];
    }
}
