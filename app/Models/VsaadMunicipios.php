<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadMunicipios extends Model
{
   protected $table = 'vsaad_municipios';

    public function departamento()
	{
	  return $this->belongsTo('App\Models\VsaadDepartamentos','departamento_id');
	}
  public function atencion_victima()
  {
    return $this->hasMany('App\Models\VsaadAtencionVictimas','municipio_id');
  }

  public function atencion_victima_hechos()
  {
    return $this->hasMany('App\Models\VsaadAtencionVictimas','municipio_hechos_id');
  }
	// public function persona_nacimiento()
  //   {
  //     return $this->hasMany('App\Models\Persona','mpio_nacimiento_id');
  //   }
  //   public function persona_residencia()
  //   {
  //     return $this->hasMany('App\Models\Persona','mpio_residencia_id');
  //   }
  //    public function hecho()
  // {
  //   return $this->hasMany('App\Models\Hecho','mpio_hecho_id');
  // }
}
