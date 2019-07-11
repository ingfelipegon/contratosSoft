<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadabogadoAntecedente extends Model
{

  protected $table = 'vsaad_abogados_antecedentes';
  protected $hidden =['created_at','updated_at'];

  public function abogado()
  {
    return $this->belongsTo('App\Models\SaadAbogado','abogado_id');
  }
}
