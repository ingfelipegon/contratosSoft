<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsaadenfoqueAbogado extends Model
{
  protected $table = 'vsaad_enfoques_abogados';
  protected $hidden =['created_at','updated_at'];

  public function abogado()
  {
    return $this->hasMany('App\Models\SaadAbogado','enfoques_abogados_id');
  }


}
