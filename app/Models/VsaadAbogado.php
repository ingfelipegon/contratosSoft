<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadAbogado extends Model
{
  protected $table = 'saad_abogados';
  protected $hidden =['created_at','updated_at'];

  protected $fillable = [
      'nombres_nombre1',
      'nombres_nombre2',
      'nombres_apellido1',
      'nombres_apellido2',
      'correo',
      'tarjeta_profesional',
      'tipos_documentos_id',
      'direccion_residencia',
      'no_identificacion',
      'telefono_contacto',
      'correo',
      'enfoques_abogados_id',
      'tipos_abogados_id',
      'fecha_fin_contrato',
      'fecha_inicio_contrato',
      'numero_contrato',
      'contrato',
      'convenio',
      'pnud',
      'resolucion',
      'sexo_id',
      'identidades_generos_id',
      'etnia_id',
      'grupo_etnico',
      'trabajo_territorial',
      'adjunto_copia_tarjeta_profesional',
      'adjunto_penales',
      'adjunto_contravencionales',
      'adjunto_csj',
      'adjunto_pgn',
      'adjunto_tarjeta_profesional',
      'adjunto_resolucion',
      'estado'

  ];



  //   'etnia'=>$request->pertenencia_etnia,
  //   'grupo_etnico'=>$request->grupo_etnico,
  //     'tipo_documento'=>$request->tipo_documento,
  //     'no_identificacion'=>$request->no_identificacion,


  public function tipo_documento()
  {
      return $this->belongsTo('App\Models\VsaadtipoDocumento','tipos_documentos_id');
  }

  public function enfoque_abogado()
  {
      return $this->belongsTo('App\Models\VsaadenfoqueAbogado','enfoques_abogados_id');
  }

  public function tipo_abogado()
  {
      return $this->belongsTo('App\Models\VsaadtipoAbogado','tipos_abogados_id');
  }

  public function pertenencia_etnia()
  {
      return $this->belongsTo('App\Models\VsaadpertenenciaEtnia','etnia_id');
  }

  public function identidad_genero()
  {
      return $this->belongsTo('App\Models\VsaadidentidadGenero','identidades_generos_id');
  }


  public function sexo()
  {
      return $this->belongsTo('App\Models\VsaadSexo','sexo_id');
  }

  public function experiencia()
  {
      return $this->hasMany('App\Models\VsaadabogadoExperiencia','abogado_id');
  }

  public function educacion()
  {
      return $this->hasMany('App\Models\VsaadabogadoEducacion','abogado_id');
  }

  public function apoderado()
  {
      return $this->hasMany('App\Models\VsaadabogadoApoderado','abogado_id');
  }

  public function antecedentes()
  {
      return $this->hasMany('App\Models\VsaadabogadoAntecedente','abogado_id');
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
