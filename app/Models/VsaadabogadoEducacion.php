<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadabogadoEducacion extends Model
{
  protected $table = 'vsaad_abogados_educacion';
  protected $hidden =['created_at','updated_at'];

  protected $fillable = [
      'universidad',
      'pais',
      'titulo',
      'pre_pos',
      'abogado_id',
      'fecha_titulo',
  ];

  public function abogado()
  {
    return $this->belongsTo('App\Models\SaadAbogado','abogado_id');
  }
}
