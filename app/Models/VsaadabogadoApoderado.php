<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadabogadoApoderado extends Model
{
  protected $table = 'vsaad_abogados_apoderados';
  protected $hidden =['created_at','updated_at'];

  protected $fillable = [
      'nombre',
      'documento',
      'tipo_apoderado',
      'abogado_id',
  ];

  public function abogado()
  {
    return $this->belongsTo('App\Models\SaadAbogado','abogado_id');
  }
}
