<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EducacionResource;
use App\Http\Resources\ExperienciaResource;
use Illuminate\Support\Facades\Storage;

class AbogadoResource extends JsonResource
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
        // $files = Storage::allFiles($directory); //traer todos los archivos para su visualización
        return[
          'id'=>$this->id,
          'tipos_documentos_id'=>$this->tipos_documentos_id,
          'tipos_documentos'=>$this->tipo_documento,
          'no_identificacion'=>$this->no_identificacion,
          'tarjeta_profesional'=>$this->tarjeta_profesional,
          'direccion_residencia'=>$this->direccion_residencia,
          'telefono_contacto'=>$this->telefono_contacto,
          'correo'=>$this->correo,
          'enfoques_abogados_id'=>$this->enfoques_abogados_id,
          'enfoques_abogados'=>$this->enfoque_abogado,
          'tipos_abogados_id'=>$this->tipos_abogados_id,
          'tipos_abogados'=>$this->tipo_abogado,
          'fecha_fin_contrato'=>$this->fecha_fin_contrato,
          'fecha_inicio_contrato'=>$this->fecha_inicio_contrato,
          'contrato'=>$this->contrato,
          'convenio'=>$this->convenio,
          'numero_contrato'=>$this->numero_contrato,
          'resolucion'=>$this->resolucion,
          'pnud'=>$this->pnud,
          'sexo_id'=>$this->sexo_id,
          'sexo'=>$this->sexo,
          'identidades_generos_id'=>$this->identidades_generos_id,
          'identidades_generos'=>$this->identidad_genero,
          'etnia_id'=>$this->etnia_id,
          'etnias'=>$this->pertenencia_etnia,
          'grupo_etnico'=>$this->grupo_etnico,
          'trabajo_territorial'=>$this->trabajo_territorial,
          'activo'=>$this->activo,
          'estado'=>$this->estado,
          // 'nombres'=>$this->nombres_apellidos(),
          'nombres_nombre1'=>$this->nombres_nombre1,
          'nombres_nombre2'=>$this->nombres_nombre2,
          'nombres_apellido1'=>$this->nombres_apellido1,
          'nombres_apellido2'=>$this->nombres_apellido2,

          'adjunto_resolucion'=>$this->adjunto_resolucion,
          'adjunto_penales'=>$this->adjunto_penales,
          'adjunto_contravencionales'=>$this->adjunto_contravencionales,
          'adjunto_csj'=>$this->adjunto_csj,
          'adjunto_pdgn'=>$this->adjunto_pdgn,
          'adjunto_tarjeta_profesional'=>$this->adjunto_tarjeta_profesional,
          'adjunto_copia_tarjeta_profesional'=>$this->adjunto_copia_tarjeta_profesional,
          // 'educacion'=>$thid->
          // 'educacion' => EducacionResource::collection($this->whenLoaded('educacion')),
          'educacion' => $this->educacion,
          'experiencia' => $this->experiencia,
          'apoderado' => $this->apoderado,
          'files_to_upload' => [],

        ];

    }
}
