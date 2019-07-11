<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadAllegadosFamiliares extends Model
{
  protected $table = 'vsaad_allegados_familiares';
  protected $hidden =['created_at','updated_at'];

/*
nombre_allegado	varchar
documento_allegado	varchar
parentezco_allegado	varchar
adjunto_allegado	adjunto
*/

  protected $fillable = [
      'nombre_allegado',
      'nombre2_allegado',
      'apellido1_allegado',
      'apellido2_allegado',
      'documento_allegado',
      'parentezco_allegado',
      'adjunto_allegado'
  ];

  public function atencion()
  {
    return $this->belongsTo('App\Models\VsaadAtencionVictimas','atencion_id');
  }
}
