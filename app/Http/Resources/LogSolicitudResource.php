<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogSolicitudResource extends JsonResource
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
            'item' => $this->item,					
            'descripcion' => $this->descripcion,	
            'observacion' => $this->observacion,            
            'duracioncontrato' => $this->duracioncontrato,			
            'nombresupervisor' => $this->nombresupervisor,
            'tienereparto' => $this->tienereparto,
            'modalidad_id' =>  $this->modalidad_id,             
            'modalidades' => $this->modalidad,                      //RELACION CON MODALIDAD
            'estadoproceso_id' => $this->estadoproceso_id,
            'estadosProceso' => $this->estadoProceso,               //RELACION CON ESTADOS PROCESO
            'estadooperacion_id' =>  $this->estadooperacion_id,
            'estadosOperacion' =>  $this->estadoOperacion,          //RELACION CON LOS ESTADOS DE LA OPERACION
            'areasolicitante_id' =>  $this->areasolicitante_id,
            'dependencias' =>  $this->area,                         //RELACION CON DEPENDENCIAS
            'respopnsable_id' =>  $this->respopnsable_id,
            'responsables' =>  $this->responsable,                  //RELACION DE RESPONSABLES
            'tipotramite_id' =>  $this->tipotramite_id,              
            'tiposTramite' =>  $this->tipoTramite,                  //RELACION CON TIPOS TRAMITE 
            'movimientos' =>  $this->movimientos,                   //RELACION CON MOVIMIENTOS
            'usuarioNovedad_id' =>  $this->usuarioNovedad_id,
            'usuarioNovedad' =>  $this->usuarioNovedad,             //RELACION DE USUARIOS QUE REALIZAN LAS NOVEDADES O MODIFICACIONES
            
        ];
    }
}
