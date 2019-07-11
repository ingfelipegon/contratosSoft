<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ResponsableResource;
use App\Http\Resources\AllegadosFamiliaresResource;

class AtencionVictimasResource extends JsonResource
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
        return[
          'id'=>$this->id,
          'solicitud_anterior' => $this->solicitud_anterior,
          'no_registro_victima' => $this->no_registro_victima,
          'formulario_propio' => $this->formulario_propio,
          'persona_victima' => $this->persona_victima,
          'nombre_victima_solicitante' => $this->nombre_victima_solicitante,
          'nombre2_victima_solicitante' => $this->nombre2_victima_solicitante,
          'apellido1_victima_solicitante' => $this->apellido1_victima_solicitante,
          'apellido2_victima_solicitante' => $this->apellido2_victima_solicitante,
          'tipos_documentos_id'=>$this->tipos_documentos_id,
          'tipos_documentos'=>$this->tipo_documento,
          'no_identificacion'=>$this->no_identificacion,
          'direccion' => $this->direccion,
          'departamento_id' => $this->departamento,
          'municipio_id' => $this->municipio,
          'grupo_etnico' => $this->grupo_etnico,
          'organización_victimas' => $this->organización_victimas,
          'sujeto_colectivo' => $this->sujeto_colectivo,
          'nombre_sujeto_colectivo' => $this->nombre_sujeto_colectivo,
          'indicativo' => $this->indicativo,
          'telefono_fijo' => $this->telefono_fijo,
          'telefono_celular' => $this->telefono_celular,
          'correo' => $this->correo,
          'ocupacion_actual' => $this->ocupacion_actual,
          'hecho_victimizante' => $this->hecho_victimizante,
          'fecha_hechos_inicio' => $this->fecha_hechos_inicio,
          'fecha_hechos_fin' => $this->fecha_hechos_fin,
          'departamento_hechos_id' => $this->departamento_hechos,
          'municipio_hechos_id' => $this->municipio_hechos,
          'lugar_hechos' => $this->lugar_hechos,
          'abogado_confianza' => $this->abogado_confianza,
          'nombre_abogado' => $this->nombre_abogado,
          'nombre2_abogado' => $this->nombre2_abogado,
          'apellido1_abogado' => $this->apellido1_abogado,
          'apellido2_abogado' => $this->apellido2_abogado,
          'direccion_abogado' => $this->direccion_abogado,
          'telefono_abogado' => $this->telefono_abogado,
          'celular_abogado' => $this->celular_abogado,
          'correo_abogado' => $this->correo_abogado,
          'adjunto_poder_abogado' => $this->adjunto_poder_abogado,
          'poder_abogado' => $this->poder_abogado,
          'representado_actualmente_jep' => $this->representado_actualmente_jep,
          'manifiesta_interes' => $this->manifiesta_interes,
          'voluntad_actuar_solo' => $this->voluntad_actuar_solo,
          'medio_representacion' => $this->medio_representacion,
          'riesgo_seguridad' => $this->riesgo_seguridad,
          'razones_riesgo_seguridad' => $this->razones_riesgo_seguridad,
          'autoriza_notificacion' => $this->autoriza_notificacion,
          'activo' => $this->activo,
          'codigo_registro' => $this->codigo_registro,
          'orfeo' => $this->orfeo,
          'estado' => $this->estado,
          'disclaimer' => $this->disclaimer,

          'allegados_familiares' => $this->allegados_familiares,
          'presuntos_responsables' => $this->responsables,
          'files_to_upload' => [],

        ];

    }
}
