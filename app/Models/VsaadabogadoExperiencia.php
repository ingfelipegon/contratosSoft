<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadabogadoExperiencia extends Model
{
  protected $table = 'vsaad_abogados_experiencias';
  protected $hidden =['created_at','updated_at'];

  protected $fillable = [
      'cargo',
      'entidad',
      'fecha_ingreso',
      'fecha_salida',
      'abogado_id',
  ];

  public function abogado()
  {
    return $this->belongsTo('App\Models\SaadAbogado','abogado_id');
  }
}
