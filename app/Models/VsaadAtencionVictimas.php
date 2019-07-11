<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadAtencionVictimas extends Model
{
  protected $table = 'saad_atencion_victimas';
  protected $hidden =['created_at','updated_at'];

  protected $fillable = [
    'solicitud_anterior',
    'no_registro_victima',
    'formulario_propio',
    'persona_victima',
    'nombre_victima_solicitante',
    'nombre2_victima_solicitante',
    'apellido1_victima_solicitante',
    'apellido2_victima_solicitante',
    'tipos_documentos_id',
    'no_identificacion',
    'direccion',
    'departamento_id',
    'municipio_id',
    'grupo_etnico',
    'organización_victimas',
    'sujeto_colectivo',
    'nombre_sujeto_colectivo',
    'telefono_fijo',
    'indicativo',
    'telefono_celular',
    'correo',
    'ocupacion_actual',
    'hecho_victimizante',
    'fecha_hechos_inicio',
    'fecha_hechos_fin',
    'departamento_hechos_id',
    'municipio_hechos_id',
    'lugar_hechos',
    'abogado_confianza',
    'nombre_abogado',
    'nombre2_abogado',
    'apellido1_abogado',
    'apellido2_abogado',
    'direccion_abogado',
    'telefono_abogado',
    'celular_abogado',
    'correo_abogado',
    'adjunto_poder_abogado',
    'poder_abogado',
    'manifiesta_interes',
    'representado_actualmente_jep',
    'voluntad_actuar_solo',
    'medio_representacion',
    'riesgo_seguridad',
    'razones_riesgo_seguridad',
    'autoriza_notificacion',
    'activo',
    'codigo_registro',
    'orfeo',
    'estado',
    'disclaimer'

  ];



  //   'etnia'=>$request->pertenencia_etnia,
  //   'grupo_etnico'=>$request->grupo_etnico,
  //     'tipo_documento'=>$request->tipo_documento,
  //     'no_identificacion'=>$request->no_identificacion,


  public function tipo_documento()
  {
      return $this->belongsTo('App\Models\VsaadtipoDocumento','tipos_documentos_id');
  }
  public function municipio()
  {
      return $this->belongsTo('App\Models\VsaadMunicipios','municipio_id');
  }

  public function departamento()
  {
      return $this->belongsTo('App\Models\VsaadDepartamentos','departamento_id');
  }

  public function municipio_hechos()
  {
      return $this->belongsTo('App\Models\VsaadMunicipios','municipio_hechos_id');
  }

  public function departamento_hechos()
  {
      return $this->belongsTo('App\Models\VsaadDepartamentos','departamento_hechos_id');
  }


  public function responsables()
  {
      return $this->hasMany('App\Models\VsaadResponsables','atencion_id');
  }

  public function allegados_familiares()
  {
      return $this->hasMany('App\Models\VsaadAllegadosFamiliares','atencion_id');
  }



  public function nombres_apellidos()
     {

         $nombres_apellidos=trim($this->nombres);

         if((!empty($this->apellidos))&&(!is_null($this->apellidos)))
         {
            $nombres_apellidos=$nombres_apellidos." ".trim($this->apellidos);
         }

         return strtoupper($nombres_apellidos);
     }

}
