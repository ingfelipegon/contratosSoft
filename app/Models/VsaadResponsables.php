<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadResponsables extends Model
{
  protected $table = 'vsaad_responsables';
  protected $hidden =['created_at','updated_at'];

/*
nombre_responsable	varchar
alias_responsable	varchar
estructura_responsable	select
*/

  protected $fillable = [
      'nombre_responsable',
      'nombre2_responsable',
      'apellido1_responsable',
      'apellido2_responsable',
      'alias_responsable',
      'bloque_id',
      'frente_id',
      'otro'
  ];

  public function atencion()
  {
    return $this->belongsTo('App\Models\VsaadAtencionVictimas','atencion_id');
  }
  public function bloque()
  {
      return $this->belongsTo('App\Models\VsaadBloque','bloque_id');
  }
  public function frente()
  {
      return $this->belongsTo('App\Models\VsaadFrentes','frente_id');
  }
}
